<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once __DIR__ . '/../php/login-database.php';
include_once __DIR__ . '/../php/objects/Partia.php';
include_once __DIR__ . '/../php/objects/ImageHandler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partia</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include_once '../snippets/header-logged.html'; ?>
    <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
            <label for="nazwa">nazwa partii</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="skrot">podaj skróconą nazwę partii</label>
            <input type="text" name="skrot" id="skrot">
            <label for="logo_src">tu logo partii :) </label>
            <input type="file" name="logo_src" id="logo_src">
            <button type="submit">tu zatwierdź</button>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $dirPath = __DIR__ . '/../assets/user_images/partia/';
                $ih = new ImageHandler($dirPath, $_FILES['logo_src']);
                $ih->saveFile();
                $final_path = $ih->getFinalPath();

                $partia = new Partia($conn, null);
                $data = [
                    "nazwa" => $conn->real_escape_string($_POST["nazwa"]),
                    "skrot" => $conn->real_escape_string($_POST["skrot"]),
                    "logo_src" => $final_path,
                ];
                $partia->setData($data);
                if ($partia->insertDataToDb()) {
                    echo "Poprawnie :D";
                } else {
                    echo "no nie :(";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>