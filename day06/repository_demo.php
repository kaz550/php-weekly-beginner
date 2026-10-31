<?php
declare(strict_types=1);
final class TaskRepository
{
    public function __construct(private PDO $pdo) {}

    public function all(): array
    {
        return $this->pdo->query(
            'SELECT id, title, is_done FROM tasks ORDER BY id DESC'
        )->fetchAll(PDO::FETCH_ASSOC);
    }
}
$pdo = require __DIR__ . '/db.php';
$repository = new TaskRepository($pdo);
echo count($repository->all()) . PHP_EOL;
