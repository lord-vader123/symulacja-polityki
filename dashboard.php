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
    <title>Zalogowany jako: </title>
</head>

<body>

    <?php include_once __DIR__ . '/snippets/header-logged.html'; ?>

    <div class="content">

    </div>

    <?php include_once __DIR__ . '/snippets/footer.html'; ?>

</body>

</html>