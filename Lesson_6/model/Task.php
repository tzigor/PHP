<?php

class Task
{
    private User $user;
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone = false;
    private array $comments = [];


    function __construct(User $user, string $description, int $priority)
    {
        $this->user = $user;
        $this->description = $description;
        $this->priority = $priority;
        $this->dateCreated = new DateTime();
        $this->isDone = false;
    }

    public function setDescription(string $description, $priority = 0): void
    {
        $this->description = $description;
        $this->priority = $priority;
        $this->dateUpdated = new DateTime();
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getDateCreated(): string
    {
        return date_format($this->dateCreated, 'd-M-Y H:i');
    }

    public function markAsDone(): void
    {
        $this->isDone = true;
        $this->dateDone = new DateTime();
    }

    public function taskStatus(): bool
    {
        return $this->isDone;
    }

    public function newComment(Comment $comment): void
    {
        $this->comments[$comment->getUserName()] = $comment->getText();
    }
}

class Comment
{
    private User $author;
    private Task $task;
    private string $text;

    public function setUser(User $user): void
    {
        $this->author = $user;
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getUserName(): string
    {
        return $this->author->getUsername();
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

class TaskService
{
    public static function addComment(User $user, Task $task, string $text): Comment
    {
        $comment = new Comment();
        $comment->setText($text);
        $comment->setUser($user);
        $comment->setTask($task);
        return $comment;
    }
}
