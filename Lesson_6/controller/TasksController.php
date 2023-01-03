<?php
require_once 'model/User.php';
require_once 'model/Task.php';

session_start();
$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

$tasks = null;
if (isset($_SESSION['tasks'])) {
    foreach ($_SESSION['tasks'] as $key => $task) {
        if (!$task->taskStatus()) {
            $tasks[] = $task;
        }
    }
};

include 'view/tasks.php';
