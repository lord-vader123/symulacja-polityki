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
<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="nazwa">nazwa komitetu</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="partia_id">nazwa partii</label>
            <input type="text" name="partia_id" id="partia_id">
            <button type="submit">tu zatwierdź</button>
        </form>
</div>
</body>
</html>