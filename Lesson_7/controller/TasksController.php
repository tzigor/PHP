<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
$pdo = require 'db.php';

session_start();
$userName = null;
$status = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
} else {
    header('Location: /?controller=index');
    die();
}

if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
} else {
    $status = 0;
    $_SESSION['status'] = $status;
}

$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getUndoneList($userName, $status);

include 'view/tasks.php';
