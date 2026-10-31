<?php
declare(strict_types=1);
try {
 $pdo = require __DIR__ . '/db.php';
 $stmt = $pdo->prepare('INSERT INTO tasks (title) VALUES (:title)');
 $stmt->execute(['title' => 'PHPの復習']);
 $id = (int) $pdo->lastInsertId();
 $stmt = $pdo->prepare('UPDATE tasks SET is_done = 1 WHERE id = :id');
 $stmt->execute(['id' => $id]);
 $stmt = $pdo->prepare('SELECT title FROM tasks WHERE id = :id');
 $stmt->execute(['id' => $id]);
 echo $stmt->fetchColumn() . PHP_EOL;
 $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
 $stmt->execute(['id' => $id]);
} catch (Throwable $e) {
 error_log($e->getMessage());
 exit('処理失敗');
}
