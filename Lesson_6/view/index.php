<?php 
    include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php if ($userName): ?>
        Welcomme <?=$userName?> <a href="/?logout">Exit</a>
        <a href="tasks.php">Tasks</a>
    <?php else: ?>
        <form action='' method="POST">
            <input type="text" name="username">
            <input type="text" name="pass">
            <input type="submit">  
        </form>      
    <?php endif; ?>
</body>
</html>