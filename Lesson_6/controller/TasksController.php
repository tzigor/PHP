<?php
require_once 'model/User.php';
require_once 'model/Task.php';

session_start();
$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

$tasks = null;
if (isset($_SESSION['tasks'])) {
    $tasks = $_SESSION['tasks'];
};

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    print_r($_SESSION['tasks']);
    die();
    $key = $_GET['key'];
    unset($_SESSION['tasks'][$key]);
    header('Location: /?controller=tasks');
    die();
}

include 'view/tasks.php';