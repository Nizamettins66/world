<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        foreach ($countries as $country) {
            echo "<tr>";
            echo "<td>" . $country->Name . "<td>";
            echo "<td>" . $country->Code . "<td>";
            echo "<td>" . number_format($country->Population, 0, ',', ' ') . "<td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>