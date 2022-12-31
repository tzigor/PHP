<?php

require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();

$error = null;

if (isset($_POST['username'], $_POST['pass'])){
    $userName = $_POST['username'];
    $password = $_POST['pass'];
    $userProvider = new UserProvider();
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