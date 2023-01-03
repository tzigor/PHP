<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="index.css">
</head>
<style>
    <?php include 'index.css'; ?>
</style>

<body>
    <div class="header"><?= $pageHeader ?></div>
    <br>
    <?php if ($userName !== null) : ?>
        <div class="menu">
            <a class="tasks" href="/?controller=tasks">Tasks</a>
        </div>
        <p>Hello <?= $userName ?>. <a href='?action=logout'>[Exit]</a></p>
    <?php else : ?>
        <a class="auth" href="/?controller=security">Sign In</a>
    <?php endif; ?>
</body>