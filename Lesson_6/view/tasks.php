<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>Hello <?= $userName ?>.</p>
    <a href="/">Main</a>
    <a href="/?controller=addTask">Add Task</a>
    <br>
    <?php foreach($tasks as $key => $task): ?>  
        <div>
            * <?=$task->getDescription()?> <a href="/?action=delete&key=<?=$key?>">[X]</a>
        </div>
    <?php endforeach; ?> 
</body>