<?php
include_once __DIR__ . '/../php/login-database.php';
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista polityków</title>
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
                <td>Zdjęcie</td>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td>Partia</td>
            </tr>
            <?php
            $query = 'SELECT imie, nazwisko, zdjecie_src, partia.skrot FROM polityk INNER JOIN partia on polityk.partia_id = partia.id';
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {

                $zdjecie_src = $row['zdjecie_src'];
                $imgPos = strpos($zdjecie_src, '/symulacja-polityki');

                if ($imgPos !== false) {
                    $path = substr($zdjecie_src, $imgPos);
                }

                echo "<tr> <td>";
                echo '<img src="' . $path . '" alt="Zdjęcie polityka">';
                echo "</td> <td>";
                echo $row['imie'];
                echo "</td> <td>";
                echo $row['nazwisko'];
                echo "</td> <td>";
                echo $row["skrot"];
            }
            ?>
        </table>
    </main>

    <footer>

    </footer>
</body>

</html>