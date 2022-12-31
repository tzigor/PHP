<?php 
    session_start();
    $userName = null;
    if (isset($_POST['username']) && !empty($_POST['username'])) {
        // setcookie('username', $userName, time() + 10800, '/');
        $userName = $_POST['username'];
        $pass = isset($_POST['pass']) ?? null;
        if ($userName == 'igor' && $pass == '123'){
            // var_dump($_POST);
            // die(); 
            $_SESSION['username'] = $userName;
            header('Location: /');
            die(); 
        } else {
            die ('Wrong name or passord.'); 
        }
        
     }

    //  if (isset($_COOKIE['username'])) {
    //     $userName = $_COOKIE['username'];
    //  }

    if (isset($_SESSION['username'])) {
        $userName = $_SESSION['username'];
     }

     if (isset($_REQUEST['logout'])) {
        // setcookie('username');
        unset($_SESSION['username']);
        session_destroy();
        header('Location: /');
        die();
     }  
?>