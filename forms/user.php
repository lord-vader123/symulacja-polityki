<?php
// include_once __DIR__ . '/../php/login-database.php';
// include_once __DIR__ . '/../php/objects/User.php';
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
<?php include_once '../snippets/header.html'; ?>
    <div class="content">
        <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="nazwa">login</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="pasword">hasło</label>
            <input type="password" name="pasword" id="pasword">
            <button type="submit">zaloguj</button>
        </form>
        <?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
}
?>
    </div>
</body>
</html>