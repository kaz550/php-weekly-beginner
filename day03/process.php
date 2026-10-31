<?php
declare(strict_types=1);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit('POSTで送信してください。');
}
$title = $_POST['title'] ?? null;
if (!is_string($title)) {
    http_response_code(400);
    exit('文字列を入力してください。');
}
$title = trim($title);
if ($title === '' || mb_strlen($title) > 200) {
    http_response_code(400);
    exit('タスク名は1〜200文字で入力してください。');
}
header('Content-Type: text/html; charset=UTF-8');
echo '受信したタスク：';
echo htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
