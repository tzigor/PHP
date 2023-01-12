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

include 'view/tasks.php';
