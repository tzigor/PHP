<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'tasks.css'; ?>
</style>

<body>
    <div class="container">
        <div class="topContainer">
            <div class="menu">
                <a href="/">Main</a>
                <a href="/?controller=addTask">Add Task</a>
                <p>Hello <?= $userName ?>.</p>
            </div>
            <div class="header">Task controller</div>
        </div>

        <div class="tasks">
            <p>Task List</p>
            <div class="taskHeader">
                <p>Description</p>
                <p>Priority</p>
                <p>Mark as done</p>
            </div>
            <?php if ($tasks !== null) : ?>
                <?php foreach ($tasks as $key => $task) : ?>
                    <div class="taskList">
                        <p><?= $task->getDescription() ?></p>
                        <p><?= $task->getPriority() ?></p>
                        <a href="/?action=delete&key=<?= $task->getId() ?>">[Task done]</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No active tasks</p>
            <?php endif; ?>
        </div>

    </div>

</body>