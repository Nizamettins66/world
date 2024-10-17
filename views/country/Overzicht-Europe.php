<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            text-align: left;
        }
    </style>
</head>

<body>
    <table>

        <tr>
            <th>Naam</th>
            <th></th>
            <th>Hoofdstad</th>
            <th></th>
            <th>Oppervlakte</th>
            <th></th>
            <th>Taal</th>

        </tr>
        <?php
        foreach ($countries as $country) {


            echo "<tr>";
            echo "<td>" . $country->Name . "<td>";
            echo "<td><a href='http://localhost:8080/city/view?id=" . $country->hoofdstad->ID . "'>" . $country->hoofdstad->Name . "</a><td>";
            echo "<td>" . number_format($country->SurfaceArea, 0, ',', ' ') . "<td>";
            // echo "<td>" . $country->countrylanguages[0]->Language . "<td>";
            echo "<td>";
            $length = count($country->countrylanguages);

            for ($i = 0; $i < $length; $i++) {
                echo "<br>" . $country->countrylanguages[$i]->Language;
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>