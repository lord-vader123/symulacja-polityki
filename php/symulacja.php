<?php
include_once __DIR__ . '/login-database.php';

$sql = "
    SELECT partia_id, SUM(poparcie) AS suma_poparcia
    FROM politycy
    GROUP BY partia_id
    ORDER BY suma_poparcia DESC
";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Symulacja</title>
</head>
<body>
    
        <main>
           <?php
            if ($result->num_rows > 0) {
                echo "Poparcie dla poszczególnych partii:\n";

                while ($row = $result->fetch_assoc()) {
                    echo "Partia ID: " . $row['partia_id'] . " - Suma poparcia: " . $row['suma_poparcia'] . "%\n";
                }
            } else {
                echo "Brak wyników.\n";
            }
           ?>
        </main>

</body>
</html>