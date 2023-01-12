<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="index.css">
</head>
<style>
    <?php include 'index.css'; ?>
</style>

<body>
    <div class="topContainer">
        <?php if ($userName !== null) : ?>
            <div class="menu">
                <a class="tasks" href="/?controller=tasks">Tasks</a>
                <p>Hello <?= $userName ?>.
                    <a href='?action=logout'>
                        <button class='exitBtn'>Exit</button>
                    </a>
                </p>
            </div>

        <?php else : ?>
            <div class="auth">
                <a href="/?controller=security">Sign In</a>
                <a href="/?controller=signUp">Sign Up</a>
            </div>
        <?php endif; ?>

        <div class="header"><?= $pageHeader ?></div>
    </div>
</body>