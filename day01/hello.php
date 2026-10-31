<?php
declare(strict_types=1);
$name = 'PHP学習者';
$day = 1;
$tasks = ['環境構築', '変数', '条件分岐'];
echo '<h1>' . htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</h1>';
echo '<p>' . $day . '日目の学習です。</p>';
foreach ($tasks as $task) {
    echo '<p>' . htmlspecialchars($task, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
}
