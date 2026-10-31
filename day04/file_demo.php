<?php
declare(strict_types=1);
$file = __DIR__ . '/memo.txt';
if (file_put_contents($file, "PHPの学習\n", LOCK_EX) === false) {
    throw new RuntimeException('書き込み失敗');
}
$text = file_get_contents($file);
if ($text === false) {
    throw new RuntimeException('読み込み失敗');
}
echo $text;
