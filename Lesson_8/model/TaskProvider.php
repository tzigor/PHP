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
            tasks (user, description, priority, isDone) 
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

    public function getUndoneList(string $username, int $mode): ?array
    {
        $taskList = null;
        $statement = $this->pdo->prepare('SELECT * FROM `tasks` WHERE isDone=:isDone AND user=:user');
        $statement->execute([
            'isDone' => $mode,
            'user' => $username
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Task', ['', '', 0]);
        $taskList = $statement->fetchAll();
        if (!empty($taskList)) return $taskList;
        else return null;
    }

    public function setTaskStatus(int $id, int $satus)
    {
        $statement = $this->pdo->prepare("UPDATE tasks SET isDone=:isDone WHERE id=:id");
        $statement->execute([
            'isDone' => $satus,
            'id' => $id
        ]);
    }
}
