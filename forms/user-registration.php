<?php
include_once __DIR__ . '/../php/login-database.php';
include_once __DIR__ . '/../php/objects/User.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/symulacja-polityki/assets/ikonka.ico" type="image/x-icon">
    <title>Zarejestruj sie</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include_once '../snippets/header.html'; ?>
    <div class="content">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="nazwa">login</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="pasword">hasło</label>
            <input type="password" name="pasword" id="pasword">
            <label for="pasword">powtórz hasło</label>
            <input type="password" name="paslord" id="paslord">
            <button type="submit">zarejestruj</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $match = true;
            if ($_POST['pasword'] !== $_POST['paslord']) {
                echo "Różne hasła!";
                $match = false;
            }
            if ($match) {
                $user = new User($conn, null);
                $data = [
                    "login" => $conn->real_escape_string($_POST["nazwa"]),
                    "password" => $conn->real_escape_string($_POST["pasword"]),
                ];
                $user->setData($data);
                $user->insertDataToDb();
                setcookie("login", $data['login'], time() + 3600, "/");
                setcookie("password", $data['password'], time() + 3600, "/");
                header("Location: /symulacja-polityki/dashboard.php");
                exit();
            }
        }
        ?>
    </div>
</body>

</html>