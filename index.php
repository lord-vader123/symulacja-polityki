<?php

if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    header("Location: ./dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/symulacja-polityki/assets/ikonka.ico" type="image/x-icon">
    <title>Symulacja polityki</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php include_once __DIR__ . '/snippets/header.html'; ?>

    <div class="main">
        <div class="content">

            <p>
            <h1>
                Witaj na stronie: "Symulacja polityki"
            </h1>
            </p>

            <p>
            <h2>
                Zapytasz pewnie: a co tu się robi? Już śpieszę z wyjaśnieniem!
            </h2>
            <ul>
                <li>Tworzysz się konto</li>
                <li>Loguje się na nie</li>
                <li>Tworzy się swoją partie, swoich polityków i komitet wyborczy</li>
                <li>Przeprowadza się symulację wyborów</li>
            </ul>
            </p>
            <p>
                Liczymy na to, że będziesz się dobrze bawił!
            </p>
        </div>

        <?php include_once __DIR__ . '/snippets/footer.html' ?>
    </div>
</body>

</html>