<?php
declare(strict_types=1);
$score = 75;
if ($score >= 80) {
    echo "合格（優）\n";
} elseif ($score >= 60) {
    echo "合格\n";
} else {
    echo "再挑戦\n";
}
$status = 'done';
$label = match ($status) {
    'todo' => '未着手',
    'doing' => '進行中',
    'done' => '完了',
    default => '不明',
};
echo $label . "\n";
foreach (['環境構築', '変数', '条件分岐'] as $task) {
    echo $task . "\n";
}
