<?php 
    include 'auth.php';

    if (is_null($userName)){
        header('Location: /');
        die();
    }

    if (isset($_POST['add'])){
        $task = strip_tags($_POST['add']);
        $_SESSION['tasks'][] = $task;
        header('Location: tasks.php');
        die();
    }    

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    // var_dump($_REQUEST);
    // die();
    $key = $_GET['key'];
    unset($_SESSION['tasks'][$key]);
    header('Location: tasks.php');
    die();
}

    $tasks = $_SESSION['tasks'] ?? null;
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    Welcomme <?=$userName?> <a href="/?logout">Exit</a>
    <a href="index.php">Main</a>
    <br/>
    <h2 Your tasks >
    <form method="post">
        <input type="text" name="add" placeholder="Add task">
        <input type="submit" value="Add">
    </form>
    <br/>
    <?php if (!empty($tasks)): ?>
        <?php foreach($tasks as $key => $item): ?>  
            * <?=$item?> <a href="?action=delete&key=<?=$key?>">[X]</a>
        <?php endforeach; ?>  
    <?php else: ?>    
        No tasks
    <?php endif; ?> 
</body>
</body>
</html>