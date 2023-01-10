<?php
require_once 'model/Task.php';
require_once 'model/User.php';

session_start();
$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    if (isset($_POST['description'], $_POST['priority']) && $_POST['description'] !== '') {
        if ($_POST['priority'] == '') {
            $_POST['priority'] = 0;
        };
        $task = new Task($_SESSION['username'], $_POST['description'], $_POST['priority']);
        $_SESSION['tasks'][] = $task;
        header('Location: /?controller=tasks');
        die();
    };
};

include 'view/addTask.php';
