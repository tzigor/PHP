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
    unset($_SESSION['mode']);
    session_destroy();
}

if (isset($_GET['action']) && $_GET['action'] == 'showCompleted') {
    if (!isset($_SESSION['mode']) || $_SESSION['mode'] == 0) {
        $_SESSION['mode'] = 1;
    } else {
        $_SESSION['mode'] = 0;
    }
    header('Location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && ($_GET['action'] == 'delete' || $_GET['action'] == 'incomplete')) {
    $statement = $pdo->prepare("UPDATE tasks SET isDone=:isDone WHERE id=:id");
    if ($_GET['action'] == 'delete') $mode = 1;
    else $mode = 0;
    $statement->execute([
        'isDone' => $mode,
        'id' => $_GET['key']
    ]);
    header('Location: /?controller=tasks');
    die();
}

include 'view/index.php';
