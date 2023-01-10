<?php
require_once 'model/User.php';
require_once 'model/Task.php';
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
    $key = $_GET['key'];
    $_SESSION['tasks'][$key]->markAsDone();
    header('Location: /?controller=tasks');
    die();
}

include 'view/index.php';
