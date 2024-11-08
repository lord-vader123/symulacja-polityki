<?php
include_once __DIR__ . '/../php/login-database.php';
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista partii</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['login'])) {
        include_once __DIR__ . '/../snippets/header-logged.html';
    } else {
        include_once __DIR__ . '/../snippets/header.html';
    }
    ?>
    <main>
        <h1>Lista:</h1>
        <table>
            <tr>
                <td>Logo</td>
                <td>Nazwa</td>
                <td>Skrót</td>
            </tr>
            <?php
            $query = 'SELECT nazwa, skrot, logo_src FROM partia';
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {

                $zdjecie_src = $row['logo_src'];

                $separator = (strpos(PHP_OS, 'WIN') === 0) ? '\\' : '/';  // Sprawdzamy system, czy Windows czy Linux
            
                $imgPos = strpos($zdjecie_src, $separator . 'symulacja-polityki');  // Zmieniamy separator
            
                if ($imgPos !== false) {
                    $path = substr($zdjecie_src, $imgPos);
                }

                echo "<tr> <td>";
                echo '<img src="' . $path . '" alt="Zdjęcie polityka">';
                echo "</td> <td>";
                echo $row['nazwa'];
                echo "</td> <td>";
                echo $row['skrot'];
            }
            ?>
        </table>
    </main>

    <footer>

    </footer>
</body>

</html>