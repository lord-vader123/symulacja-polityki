<?php
error_reporting(E_ALL); // Raportuje wszystkie błędy
ini_set('display_errors', '1'); // Wyświetla błędy na ekranie
include_once __DIR__ . '/../php/login-database.php';
include_once __DIR__ . '/../php/objects/User.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/symulacja-polityki/assets/ikonka.ico" type="image/x-icon">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include_once '../snippets/header.html'; ?>
    <main>
        <div class="content">
            <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <label for="nazwa">login</label>
                <input type="text" name="nazwa" id="nazwa">
                <label for="pasword">hasło</label>
                <input type="password" name="pasword" id="pasword">
                <button type="submit">zaloguj</button>
                <p><a href="/symulacja-polityki/forms/user-registration.php">Nie mam jeszcze konta, chcę je założyć</a>
                </p>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $continue = true;
                $stmt = $conn->prepare("SELECT id FROM user WHERE login = ? AND password = ? ");
                $stmt->bind_param("ss", $_POST['nazwa'], $_POST['pasword']);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows < 1) {
                    echo "Dane są niepoprawne";
                    $continue = false;
                }
                if ($continue) {
                    $result = $result->fetch_assoc();

                    $user = new User($conn, $result['id']);
                    $data = $user->getData();
                    if (count($data) > 0) {
                        setcookie("login", $data['login'], time() + 3600, "/");
                        setcookie("password", $data['password'], time() + 3600, "/");
                        header("Location: /symulacja-polityki/dashboard.php");
                        exit();
                    } else {
                        echo "Bład xd";
                    }

                }
                $stmt->close();
            }
            ?>
        </div>
    </main>
</body>

</html>