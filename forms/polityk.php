<?php
error_reporting(E_ALL); // Raportuje wszystkie błędy
ini_set('display_errors', '1'); // Wyświetla błędy na ekranie
include_once __DIR__ . "/../php/objects/Polityk.php";
include_once __DIR__ . "/../php/objects/ImageHandler.php";
include_once __DIR__ . '/../php/login-database.php';
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
            enctype="multipart/form-data">
            <label for="imie">Imię</label>
            <input type="text" name="imie" id="imie" required>
            <label for="nazwisko">Nazwisko</label>
            <input type="text" name="nazwisko" id="nazwisko" required>
            <label for="partia_id">Nazwa partii</label>
            <input name="partia_id" id="partia_id" list="partie" required>
            <datalist id="partie">
                <?php
                $parties = $conn->query("SELECT * FROM partia");
                while ($row = $parties->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['skrot'] . '</option>';
                }
                ?>
            </datalist>
            <label for="zdjecie_src">Zdjęcie polityka</label>
            <input type="file" name="zdjecie_src" id="zdjecie_src" required>
            <button type="submit">Zatwierdź</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                // Utworzenie obiektu `ImageHandler` i zapis obrazu
                $ih = new ImageHandler("polityk", $_FILES['zdjecie_src']);
                if ($ih->saveFile()) {
                    $zdjecie_src = $ih->getFinalPath();
                } else {
                    throw new Exception('Nie udało się zapisać pliku.');
                }

                // Przygotowanie danych i ich zapis do bazy
                $polityk = new Polityk($conn, null);
                $data = [
                    "imie" => $conn->real_escape_string($_POST["imie"]),
                    "nazwisko" => $conn->real_escape_string($_POST["nazwisko"]),
                    "partia_id" => $conn->real_escape_string($_POST["partia_id"]),
                    "zdjecie_src" => $zdjecie_src,
                ];
                $polityk->setData($data);
                if ($polityk->insertDataToDb()) {
                    echo "Dodano polityka!";
                } else {
                    echo "Coś poszło nie tak…";
                }
            } catch (Exception $e) {
                echo "Błąd: " . $e->getMessage();
            }
        }
        ?>
    </div>
</body>

</html>