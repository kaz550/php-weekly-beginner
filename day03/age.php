<?php
declare(strict_types=1);
$age = filter_var($_POST['age'] ?? null, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 18, 'max_range' => 100],
]);
if ($age === false) {
    http_response_code(400);
    exit('年齢は18〜100の整数で入力してください。');
}
echo '年齢：' . $age;
