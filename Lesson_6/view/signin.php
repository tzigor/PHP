<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'signin.css'; ?>
</style>

<body>
    <div class="header">Task controller</div>
    <div class="signInText">Sign in</div>
    <div>
        <?php if ($error !== null) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
    <div class="signInBox">
        <form class="signIn" action='' method="POST">
            <input class="inputBox" type="text" name="username">
            <input class="inputBox" type="text" name="pass">
            <input class="signButton" type="submit">
        </form>
    </div>
</body>