<?php
require_once 'model/User.php';
require_once 'model/Task.php';
$pdo = require 'db.php';
session_start();
$pageHeader = 'Task controller';

$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

if (isset($_GET['action']) && $_GET['action'] == 'showCompleted') {
    if (!isset($_SESSION['status']) || $_SESSION['status'] == 0) {
        $_SESSION['status'] = 1;
    } else {
        $_SESSION['status'] = 0;
    }
    header('Location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && ($_GET['action'] == 'delete' || $_GET['action'] == 'incomplete')) {
    $id = $_GET['key'];

    $statement = $pdo->prepare("UPDATE tasks SET isDone=:isDone WHERE id=:id");
    $statement->execute([
        'isDone' => $_SESSION['status'],
        'id' => $id
    ]);
    header('Location: /?controller=tasks');
    die();
}

include 'view/index.php';
