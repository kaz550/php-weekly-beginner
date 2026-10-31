<?php
declare(strict_types=1);
ini_set('session.use_strict_mode', '1');
session_set_cookie_params([
 'lifetime' => 0,
 'path' => '/',
 'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
 'httponly' => true,
 'samesite' => 'Lax',
]);
session_start();
$_SESSION['visits'] = (int) ($_SESSION['visits'] ?? 0) + 1;
echo '訪問回数：' . $_SESSION['visits'];
