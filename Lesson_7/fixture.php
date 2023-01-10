<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';

$pdo = require 'db.php';

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
  )');

// $user = new User('admin');
// $user->setName('Igor');

// $userProvider = new UserProvider($pdo);
// $userProvider->registerUser($user, 'admin');

$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user VARCHAR(64) NOT NULL,
  description VARCHAR(500) NOT NULL,
  priority INTEGER,
  isDone INTEGER NOT NULL
)');

// $task = new Task('Igor', '2 First description', 1);
// $taskProvider = new TaskProvider($pdo);
// $taskProvider->addTask($task);
