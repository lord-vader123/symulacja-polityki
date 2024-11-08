<?php
include_once __DIR__ . '/../php/login-database.php';
include_once __DIR__ . '/../php/objects/Komitet.php';
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

    <?php include_once '../snippets/header-logged.html'; ?>
    <div class="content">
        <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="nazwa">nazwa komitetu</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="partia_id">nazwa partii</label>
            <input list="partie" name="partia_id" id="partia_id">
            <datalist id="partie">
                <?php
                $parties = $conn->query("SELECT * FROM partia");
                while ($row = $parties->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['skrot'] . '</option>';
                }
                ?>
            </datalist>

            <button type="submit">tu zatwierdź</button>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $komitet = new Komitet($conn, null);
                $data = [
                    "nazwa" => $conn->real_escape_string($_POST["nazwa"]),
                    "partia_id" => $conn->real_escape_string($_POST["partia_id"]),
                ];
                $komitet->setData($data);
                if ($komitet->insertDataToDb()) {
                    echo "Dodano komitet";
                } else {
                    echo "Nie dodano komitetu - coś poszło nie tak :(";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>