<?php

header("Pragma: public");
header("Expires: 0");
$filename = "nombreArchivoQueDescarga.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>nombre</th>
                <th>genero</th>
                <th>hobby</th>
                <th>tiempo dedicado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (json_decode($_COOKIE["todo"]) as $t) {
                echo "<tr>";
                foreach ($t as $d) {
                    echo "<td>".$d."</td>";
                }
                echo "/<tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
