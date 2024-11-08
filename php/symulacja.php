<?php
include_once __DIR__ . '/../php/login-database.php';

$query = "
SELECT sum(polityk.poparcie) AS poparcie_partii, partia.nazwa, partia.logo_src 
FROM polityk 
INNER JOIN partia ON polityk.partia_id = partia.id 
GROUP BY partia.nazwa 
ORDER BY poparcie_partii DESC;
";

$result = $conn->query($query);

$query_total = "
SELECT sum(poparcie) AS total_poparcie 
FROM polityk;
";
$total_result = $conn->query($query_total);
$total_poparcie = $total_result->fetch_assoc()['total_poparcie'];

$query_top_politician = "
SELECT imie, nazwisko, poparcie 
FROM polityk 
ORDER BY poparcie DESC 
LIMIT 1;
";
$top_politician_result = $conn->query($query_top_politician);
$top_politician = $top_politician_result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/symulacja-polityki/css/style.css">
    <title>Symulacja</title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../snippets/header-logged.html';
    ?>

    <main>
        <div class="results">
            <h2>Wynik wyborów</h2>
            <p><strong>Partia, która wygrała wybory:</strong> <?php echo $result->fetch_assoc()['nazwa']; ?></p>
            <p><strong>Polityk z największym poparciem:</strong>
                <?php echo $top_politician['imie'] . " " . $top_politician['nazwisko']; ?>
                (Poparcie: <?php echo round(($top_politician['poparcie'] / $total_poparcie) * 100, 2); ?>%)
            </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Partia</th>
                    <th>Poparcie (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result->data_seek(0);

                while ($row = $result->fetch_assoc()) {
                    $poparcie_percent = round(($row['poparcie_partii'] / $total_poparcie) * 100, 2);
                    $logo = $row['logo_src'];

                    $separator = (strpos(PHP_OS, 'WIN') === 0) ? '\\' : '/';  // Sprawdzamy system, czy Windows czy Linux
                
                    $imgPos = strpos($zdjecie_src, $separator . 'symulacja-polityki');  // Zmieniamy separator
                
                    if ($imgPos !== false) {
                        $logo = substr($logo, $imgPos);
                    }

                    $logo = str_replace('\\', '/', $logo);

                    echo '<tr>
                            <td> <img src="' . $logo . '" alt="logo partii"</td>
                            <td>' . $row['nazwa'] . '</td>
                            <td>' . $poparcie_percent . '%</td>
                          </tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>