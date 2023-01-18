<?php

class Task
{
    // private User $user;
    private string $id;
    private string $user;
    private string $description;
    private int $priority;
    private bool $isDone = false;

    function __construct(string $user, string $description, int $priority)
    {
        $this->user = $user;
        $this->description = $description;
        $this->priority = $priority;
        $this->isDone = false;
    }

    public function setDescription(string $description, $priority = 0): void
    {
        $this->description = $description;
        $this->priority = $priority;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function markAsDone(): void
    {
        $this->isDone = true;
    }

    public function taskStatus(): bool
    {
        return $this->isDone;
    }

    public function setStatus(bool $status)
    {
        $this->isDone = $status;
    }
}

class TaskList
{
    private array $tasks = [];
    public function setTask(Task $task): void
    {
        $this->tasks[] = $task;
    }
}
