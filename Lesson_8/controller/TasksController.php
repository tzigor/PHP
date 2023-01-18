<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
require_once 'model/SessionProvider.php';
$pdo = require 'db.php';

$session = new Session();
$mode = null;
$userName = $session->getUsername();
if ($userName == null) {
    header('Location: /?controller=index');
    die();
}

$mode = $session->initMode();
$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getUndoneList($userName, $mode);

if (isset($_GET['action']) && $_GET['action'] == 'showCompleted') {
    $session->setMode();
    header('Location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && ($_GET['action'] == 'delete' || $_GET['action'] == 'incomplete')) {
    if ($_GET['action'] == 'delete') {
        $taskProvider->setTaskStatus($_GET['key'], 1); // mark done
    } else {
        $taskProvider->setTaskStatus($_GET['key'], 0); // mark incomplete
    }
    header('Location: /?controller=tasks');
    die();
}

include 'view/tasks.php';
