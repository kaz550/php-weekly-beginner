<?php
declare(strict_types=1);
$name = 'PHP学習者';
$day = 8;
$tasks = ['環境構築', '変数', '条件分岐', '関数'];
echo '<h1>' . htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</h1>';
echo '<p>' . $day . '日目：' . ($day <= 7 ? '学習中' : '修了') . '</p>';
foreach ($tasks as $task) {
    echo '<p>' . htmlspecialchars($task, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
}
