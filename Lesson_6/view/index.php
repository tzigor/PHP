<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1><?= $pageHeader ?></h1>
    <br>
    <?php if ($userName !== null): ?>
        <a href="/?controller=tasks">Tasks</a>
        <p>Hello <?= $userName ?>. <a href='?action=logout'>[Exit]</a></p>
    <?php else: ?>   
        <a href="/?controller=security">Authorisation</a>
    <?php endif; ?>
</body>