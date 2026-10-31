<?php
declare(strict_types=1);
setcookie('display_mode', 'compact', [
 'expires' => time() + 86400 * 7,
 'path' => '/',
 'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
 'httponly' => true,
 'samesite' => 'Lax',
]);
$mode = $_COOKIE['display_mode'] ?? 'normal';
if (!in_array($mode, ['normal', 'compact'], true)) {
 $mode = 'normal';
}
echo htmlspecialchars($mode, ENT_QUOTES, 'UTF-8');
