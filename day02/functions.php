<?php
declare(strict_types=1);
function taskLabel(string $title, bool $done = false): string
{
    return ($done ? '完了：' : '未完了：') . $title;
}
echo taskLabel('PHPを学ぶ') . PHP_EOL;
