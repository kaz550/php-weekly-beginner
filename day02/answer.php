<?php
declare(strict_types=1);
function countCompleted(array $tasks): int
{
    $count = 0;
    foreach ($tasks as $task) {
        if ($task['is_done'] === true) {
            $count++;
        }
    }
    return $count;
}
$tasks = [
    ['title' => '環境構築', 'is_done' => true],
    ['title' => '関数', 'is_done' => false],
    ['title' => '配列', 'is_done' => true],
];
echo countCompleted($tasks) . PHP_EOL;
