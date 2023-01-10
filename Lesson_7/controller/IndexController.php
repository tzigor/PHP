<?php
require_once 'model/User.php';
require_once 'model/Task.php';
$pdo = require 'db.php';
session_start();
// session_destroy();
// unset($_SESSION['username']);
// unset($_SESSION['tasks']);
$pageHeader = 'Task controller';

$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['key'];

    $statement = $pdo->prepare("UPDATE tasks SET isDone=:isDone,  dateDone=:dateDone WHERE id=:id");
    $statement->execute([
        'isDone' => 1,
        'dateDone' => date_format(new DateTime(), 'd-M-Y H:i'),
        'id' => $id
    ]);
    // $_SESSION['tasks'][$key]->markAsDone();
    header('Location: /?controller=tasks');
    die();
}

include 'view/index.php';
