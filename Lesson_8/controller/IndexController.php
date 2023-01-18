<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
require_once 'model/SessionProvider.php';
$pdo = require 'db.php';
$pageHeader = 'Task controller';
$taskProvider = new TaskProvider($pdo);
$session = new Session();

$userName = $session->getUsername();

include 'view/index.php';
