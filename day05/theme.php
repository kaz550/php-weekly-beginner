<?php
declare(strict_types=1);
session_start();
$_SESSION['theme'] = 'dark';
echo htmlspecialchars(
 (string) ($_SESSION['theme'] ?? 'light'),
 ENT_QUOTES | ENT_SUBSTITUTE,
 'UTF-8'
);
