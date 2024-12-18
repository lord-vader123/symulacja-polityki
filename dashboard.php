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
        <h1>Witaj <?php echo $_COOKIE['login']; ?>!</h1>
        <p>Teraz możesz zacząć zabawę w naszej symulacji!</p>
        <p>W narzędziach znajdziesz dwie zakładki:</p>
        <p>1. Dodaj polityka - podajesz imie, nazwisko, nazwe partii (po dodaniu partii za pomocą zakładki numer 2) oraz dodajesz zdjęcie polityka.</p>
        <p>2. Dodaj partię - podajesz nazwę partii, skrót oraz dodajesz zdjęcie loga twojej partii.</p>
        <p>Po wykonaniu tych czynności możesz śmiało wejść w "Symuluj!"</p>
        <p>Dobrej zabawy! ♥</p>
    </div>

    <?php include_once __DIR__ . '/snippets/footer.html'; ?>

</body>

</html>