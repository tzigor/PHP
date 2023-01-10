<?php
require_once 'model/Task.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTask(Task $task): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO 
            tasks (user, description, priority, isDone, dateCreated, dateUpdated, dateDone) 
            VALUES (
                :user, 
                :description, 
                :priority,
                :isDone
                )'
        );

        if ($task->taskStatus()) $isDone = 1;
        else $isDone = 0;
        return $statement->execute([
            'user' => $task->getUser(),
            'description' => $task->getDescription(),
            'priority' => $task->getPriority(),
            'isDone' => $isDone
        ]);
    }

    public function getTasks(): ?array
    {
        $taskList = null;
        $statement = $this->pdo->prepare('SELECT * FROM `tasks` WHERE `isDone` LIKE ?');
        $statement->execute([0]);
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Task', ['', '', 0]);
        while ($statement && $taskData = $statement->fetch()) {
            $taskList[] = $taskData;
        }
        return $taskList;
    }
}
