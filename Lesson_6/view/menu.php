<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="/">Main</a>
    <a href="/?controller=security">Authorisation</a>
    <a href="/?controller=tasks">Tasks</a>
    <br>
    <?php if ($userName !== null): ?>

        <p>Hello <?= $userName ?>. <a href='?action=logout'>[Exit]</a></p>
    <?php endif; ?>
</body>