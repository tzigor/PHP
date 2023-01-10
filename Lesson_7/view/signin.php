<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    <?php include 'signin.css'; ?>
</style>

<body>
    <div class="topContainer">
        <div class="menu">
            <a href="/">Main</a>
            <a href="/?controller=signUp">Sign Up</a>
        </div>
        <div class="header">Task controller</div>
    </div>
    <div class="signInText">Sign in</div>
    <div>
        <?php if ($error !== null) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
    <div class="signInBox">
        <form class="signIn" action='' method="POST">
            <input class="inputBox" type="text" name="username">
            <input class="inputBox" type="password" name="pass">
            <input class="signButton" type="submit">
        </form>
    </div>
</body>