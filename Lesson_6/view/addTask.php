<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'addTask.css'; ?>
</style>

<body>
    <div class="menu">
        <a href="/">Main</a>
        <a href="/?controller=tasks">Tasks</a>
    </div>
    <p>User: <?= $userName ?>.</p>
    <div class="taskBox">
        <p>Add task</p>
        <form id="add" class="task" action='' method="POST">
            <input class="inputBox" type="text" name="description" placeholder="Description">
            <input class="prirityBox" type="number" name="priority" placeholder="Priority">
            <button form="add" class="taskButton" type="Submit">Add</button>
        </form>
    </div>

</body>