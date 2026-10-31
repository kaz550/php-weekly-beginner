<?php
declare(strict_types=1);
$tasks = [
    ['title' => '環境構築', 'is_done' => true],
    ['title' => '関数', 'is_done' => false],
];
foreach ($tasks as $task) {
    $mark = $task['is_done'] ? '[完了]' : '[未完了]';
    echo $mark . ' ' . $task['title'] . PHP_EOL;
}
echo '全' . count($tasks) . '件' . PHP_EOL;
