<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';
require_once 'model/SessionProvider.php';

$session = new Session();
$pdo = require 'db.php';

$error = null;

if (isset($_POST['username'], $_POST['pass'])) {
    if (!empty($_POST['username']) && !empty($_POST['pass'])) {
        $userProvider = new UserProvider($pdo);
        if (!$userProvider->userExist($_POST['username'])) {
            $user = new User($_POST['username']);
            $user->setName('Igor');
            $userProvider->registerUser($user, $_POST['pass']);
            $session->saveUser($user);
            header('Location: /');
            die();
        } else {
            $error = 'User is already registered';
        }
    } else {
        $error = 'Username or pass not set';
    }
}

include 'view/signup.php';
