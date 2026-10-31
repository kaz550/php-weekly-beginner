<?php
declare(strict_types=1);
$tasks = ['PHPの基本', '関数', '配列'];
echo count($tasks) . PHP_EOL;
echo mb_strlen('こんにちは') . PHP_EOL;
$tasks[] = 'フォーム';
echo array_pop($tasks) . PHP_EOL;
