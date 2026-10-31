<?php
declare(strict_types=1);
session_start();
require_once dirname(__DIR__) . '/src/TaskRepository.php';

try {
    $pdo = require dirname(__DIR__) . '/config/database.php';
    $repository = new TaskRepository($pdo);

    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (!is_string($token)
            || !hash_equals($_SESSION['csrf_token'], $token)) {
            http_response_code(403);
            exit('不正なリクエストです');
        }

        $action = $_POST['action'] ?? '';
        if ($action === 'add') {
            $title = $_POST['title'] ?? null;
            if (!is_string($title)) {
                http_response_code(400);
                exit('入力形式が正しくありません');
            }
            $title = trim($title);
            if ($title === '' || mb_strlen($title) > 200) {
                http_response_code(400);
                exit('タイトルは1〜200文字です');
            }
            $repository->add($title);
        } elseif (in_array($action, ['toggle', 'delete'], true)) {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1],
            ]);
            if ($id === false) {
                http_response_code(400);
                exit('IDが正しくありません');
            }
            if ($action === 'toggle') {
                $done = ($_POST['done'] ?? '') === '1';
                $repository->setDone($id, $done);
            } else {
                $repository->delete($id);
            }
        } else {
            http_response_code(400);
            exit('操作が正しくありません');
        }

        header('Location: /', true, 303);
        exit;
    }

    $items = $repository->all();
    require dirname(__DIR__) . '/views/tasks.php';
} catch (Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit('処理に失敗しました');
}
