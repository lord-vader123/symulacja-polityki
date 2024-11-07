<?php
//include_once __DIR__ . "/../php/objects/Polityk.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="content">
        <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="imie">imie</label>
            <input type="text" name="imie" id="imie">
            <label for="nazwisko">nazwisko</label>
            <input type="text" name="nazwisko" id="nazwisko">
            <label for="partia_id">nazwa partii</label>
            <input type="text" name="partia_id" id="partia_id">
            <label for="zdjecie_src">tu zdjęcie polityka :) </label>
            <input type="file" name="zdjecie_src" id="zdjecie_src">
            <button type="submit">tu zatwierdź</button>
        </form>
    </div>
</body>

</html>