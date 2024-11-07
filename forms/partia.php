<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include_once '../snippets/header-logged.html'; ?>
<div class="content">
            <label for="nazwa">nazwa partii</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="skrot">podaj skróconą nazwę partii</label>
            <input type="text" name="skrot" id="skrot">
            <label for="logo_src">tu logo partii :) </label>
            <input type="file" name="logo_src" id="logo_src">
            <button type="submit">tu zatwierdź</button>
</div>
</body>
</html>