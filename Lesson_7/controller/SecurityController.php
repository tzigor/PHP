<?php

require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();
$pdo = require 'db.php';

$error = null;

if (isset($_POST['username'], $_POST['pass'])) {
    $userName = $_POST['username'];
    $password = $_POST['pass'];
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($userName, $password);
    if ($user === null) {
        $error = 'User not found';
    } else {
        $_SESSION['username'] = $user;
        header('Location: /');
        die();
    };
};

include 'view/signin.php';
