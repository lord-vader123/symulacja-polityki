<?php

if (!isset($_COOKIE['login']) && !isset($_COOKIE['password'])) {
    header("Location: /symulacja-polityki/index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="/symulacja-polityki/assets/ikonka.ico" type="image/x-icon">
    <title>Zalogowany jako: <?php echo $_COOKIE['login']; ?></title>
</head>

<body>

    <?php include_once __DIR__ . '/snippets/header-logged.html'; ?>

    <div class="content">
        <p>Cześć <?php echo $_COOKIE['login']; ?>!</p>
    </div>

    <?php include_once __DIR__ . '/snippets/footer.html'; ?>

</body>

</html>