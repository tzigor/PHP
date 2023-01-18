<?php
require_once 'model/Task.php';
require_once 'model/User.php';
require_once 'model/TaskProvider.php';
require_once 'model/SessionProvider.php';
$pdo = require 'db.php';

$session = new Session();
$userName = $session->getUsername();
if ($userName == null) {
    header('Location: /?controller=index');
    die();
}

if ($session->usernameIsSet()) {
    if (isset($_POST['description'], $_POST['priority']) && $_POST['description'] !== '') {
        if ($_POST['priority'] == '') {
            $_POST['priority'] = 0;
        }
        $task = new Task($userName, $_POST['description'], $_POST['priority']);
        $taskProvider = new TaskProvider($pdo);
        $taskProvider->addTask($task);
        header('Location: /?controller=tasks');
        die();
    }
}

include 'view/addTask.php';
