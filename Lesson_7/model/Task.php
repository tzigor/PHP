<?php

class Task
{
    // private User $user;
    private string $id;
    private string $user;
    private string $description;
    private int $priority;
    private bool $isDone = false;
    private string $dateCreated;
    private string $dateUpdated;
    private string $dateDone;
    private array $comments = [];

    function __construct(string $user, string $description, int $priority)
    {
        $this->user = $user;
        $this->description = $description;
        $this->priority = $priority;
        $this->dateCreated = date_format(new DateTime(), 'd-M-Y H:i');
        $this->dateUpdated = date_format(new DateTime(), 'd-M-Y H:i');
        $this->dateDone = date_format(new DateTime(), 'd-M-Y H:i');
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

    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    public function setDateCreated(string $dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getDateUpdated(): string
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(string $dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    public function getDateDone(): string
    {
        return $this->dateDone;
    }

    public function setDateDone(string $dateDone)
    {
        $this->dateDone = $dateDone;
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

    public function setStatus(bool $status)
    {
        $this->isDone = $status;
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
