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
                :isDone,
                :dateCreated,
                :dateUpdated,
                :dateDone
                )'
        );

        if ($task->taskStatus()) $isDone = 1;
        else $isDone = 0;
        return $statement->execute([
            'user' => $task->getUser(),
            'description' => $task->getDescription(),
            'priority' => $task->getPriority(),
            'isDone' => $isDone,
            'dateCreated' => $task->getDateCreated(),
            'dateUpdated' => $task->getDateUpdated(),
            'dateDone' => $task->getDateDone()
        ]);
    }

    public function getTasks(): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM `tasks` WHERE `isDone` LIKE ?');
        $statement->execute([0]);

        while ($statement && $taskData = $statement->fetch(PDO::FETCH_ASSOC)) {
            $task = new Task($taskData['user'], $taskData['description'], $taskData['priority']);
            $task->setDateCreated($taskData['dateCreated']);
            $task->setDateUpdated($taskData['dateUpdated']);
            $task->setDateDone($taskData['dateDone']);
            $task->setStatus($taskData['isDone']);
            $taskList[] = $task;
        }
        return $taskList;
    }
}
