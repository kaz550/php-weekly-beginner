<?php
declare(strict_types=1);
$password = getenv('DB_PASSWORD');
if ($password === false) {
    throw new RuntimeException('DB_PASSWORDが未設定です');
}
return new PDO(
 'mysql:host=127.0.0.1;dbname=php_week;charset=utf8mb4',
 getenv('DB_USER') ?: 'app_user',
 $password,
 [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
 ]
);
