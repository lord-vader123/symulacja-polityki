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
                Skoro trafiłeś/aś na tą stronę to pewnie interesujesz się polityką
                <p>oraz zapewne ciekawi Cię co tu można zróbić więc już śpieszę z pomocą!
            </h2>
            <ul>
                <li>Tworzysz konto</li>
                <li>Logujesz się</li>
                <li>Tworzysz swoją partie, swoich polityków i komitet wyborczy</li>
                <li>Teraz możesz się pobawić w symulacje wyborów!</li>
            </ul>
            </p>
            <p>
                Liczymy na to, że zobaczymy cie na liście! :)
            </p>
        </div>

        <?php include_once __DIR__ . '/snippets/footer.html' ?>
    </div>
</body>

</html>