<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
$pdo = require 'db.php';

session_start();
$userName = null;
$mode = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
} else {
    header('Location: /?controller=index');
    die();
}

if (isset($_SESSION['mode'])) {
    $mode = $_SESSION['mode'];
} else {
    $mode = 0;
    $_SESSION['mode'] = $mode;
}

$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getUndoneList($userName, $mode);

include 'view/tasks.php';
