<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'tasks.css'; ?>
</style>

<body>
    <div class="container">
        <div class="menu">
            <a href="/">Main</a>
            <a href="/?controller=addTask">Add Task</a>
        </div>
        <p>Hello <?= $userName ?>.</p>
        <div class="tasks">
            <p>Task List</p>
            <div class="taskHeader">
                <p>Description</p>
                <p>Priority</p>
                <p>Created</p>
                <p>Mark as done</p>
            </div>
            <?php if ($tasks !== null) : ?>
                <?php foreach ($tasks as $key => $task) : ?>
                    <div class="taskList">
                        <p><?= $task->getDescription() ?></p>
                        <p><?= $task->getPriority() ?></p>
                        <p><?= $task->getDateCreated() ?></p>
                        <a href="/?action=delete&key=<?= $key ?>">[Task done]</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No tasks recorded</p>
            <?php endif; ?>
        </div>

    </div>

</body>