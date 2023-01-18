<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'tasks.css'; ?>
</style>

<body>
    <div class="topContainer">
        <div class="menu">
            <a href="/">Main</a>
            <a href="/?controller=addTask">Add Task</a>
            <p>Hello <?= $userName ?>.</p>
        </div>
        <div class="header">Task controller</div>
    </div>

    <a href='/?controller=tasks&action=showCompleted'>
        <?php if ($mode == null || $mode == 0) : ?>
            <button class="showBtn">Show completed tasks</button>
        <?php else : ?>
            <button class="showBtn">Show incompleted tasks</button>
        <?php endif; ?>
    </a>

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
                    <?php if ($mode == null || $mode == 0) : ?>
                        <a href="/?controller=tasks&action=delete&key=<?= $task->getId() ?>">[Task done]</a>
                    <?php else : ?>
                        <a href="/?controller=tasks&action=incomplete&key=<?= $task->getId() ?>">[Task incomplete]</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No active tasks</p>
        <?php endif; ?>
    </div>

</body>