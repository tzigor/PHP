<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="/">Main</a>
    <a href="/?controller=tasks">Tasks</a>
    <p>User: <?= $userName ?>.</p>
    <br>
    <form action='' method="POST">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="priority" placeholder="Priority">
        <input type="submit">  
    </form>     
</body>