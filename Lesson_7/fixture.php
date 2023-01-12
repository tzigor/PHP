<?php

$pdo = require 'db.php';

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
  )');

$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user VARCHAR(64) NOT NULL,
  description VARCHAR(500) NOT NULL,
  priority INTEGER,
  isDone INTEGER NOT NULL
)');
