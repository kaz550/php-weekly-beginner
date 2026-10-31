<?php
declare(strict_types=1);
final class Task
{
    public function __construct(
        public readonly int $id,
        public string $title,
        public bool $isDone = false
    ) {}

    public function complete(): void
    {
        $this->isDone = true;
    }
}
$task = new Task(1, 'PHPを復習する');
$task->complete();
echo $task->title . '：' . ($task->isDone ? '完了' : '未完了') . PHP_EOL;
