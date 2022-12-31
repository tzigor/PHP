<?php
require_once 'model/User.php';
session_start();
// session_destroy();
// unset($_SESSION['username']);
$pageHeader = 'Task controller';

$userName = null;
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username']->getUsername();
};

if (isset($_GET['action']) && $_GET['action'] == 'logout'){
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

include 'view/index.php';