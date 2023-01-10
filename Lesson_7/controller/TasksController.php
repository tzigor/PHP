<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
$pdo = require 'db.php';

session_start();
$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getTasks();

include 'view/tasks.php';
