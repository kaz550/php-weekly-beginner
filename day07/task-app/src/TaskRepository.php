<?php
declare(strict_types=1);
final class TaskRepository
{
    public function __construct(private PDO $pdo) {}

    public function all(): array
    {
        return $this->pdo->query(
            'SELECT id, title, is_done FROM tasks ORDER BY id DESC'
        )->fetchAll();
    }

    public function add(string $title): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO tasks (title) VALUES (:title)'
        );
        $stmt->execute(['title' => $title]);
    }

    public function setDone(int $id, bool $done): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE tasks SET is_done = :done WHERE id = :id'
        );
        $stmt->bindValue(':done', (int) $done, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
    }
}
