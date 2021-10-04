
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js'></script>
    <link rel="stylesheet" href="http://localhost:8080/test/css/main.css">
    <style>
            body {
                /* background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); */
                background-color: #e5eeea;
            }
        </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <canvas class="my-5 py-5" id="myChart" style="width:100%;max-width:800px"></canvas>
        <canvas class="my-5 py-5" id="myChart2" style="width:100%;max-width:800px"></canvas>
        <canvas class="my-5 py-5" id="myChart3" style="width:100%;max-width:800px"></canvas>
        <canvas class="my-5 py-5" id="myChart4" style="width:100%;max-width:800px"></canvas>

        <table class="table table-striped my-5" style="width:100%;max-width:800px">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>total encuestados</td>
                    <td><?php echo json_decode($_COOKIE["totalEncuestados"]) ?></td>
                </tr>
                <tr>
                    <td>nombre mas utilizado</td>
                    <td><?php echo json_decode($_COOKIE["nombreMasUtilizado"]) ?></td>
                </tr>
                <tr>
                    <td>mujeres encuestadas</td>
                    <td><?php echo json_decode($_COOKIE["mujerEncuestadas"]) ?></td>
                </tr>
                <tr>
                    <td>hombres encuestados</td>
                    <td><?php echo json_decode($_COOKIE["hombreEncuestados"]) ?></td>
                </tr>
                <tr>
                    <td>total sin hobby</td>
                    <td><?php echo json_decode($_COOKIE["totalSinHobby"]) ?></td>
                </tr>
                <tr>
                    <td>total con hobby</td>
                    <td><?php echo json_decode($_COOKIE["totalConHobby"]) ?></td>
                </tr>
                <tr>
                    <td>hobby mas elegido</td>
                    <td><?php echo json_decode($_COOKIE["hobbyMasElegido"]) ?></td>
                </tr>
                <tr>
                    <td>hobby menos elegido</td>
                    <td><?php echo json_decode($_COOKIE["hobbyMenosElegido"]) ?></td>
                </tr>
                <tr>
                    <td>tiempo menos dedicado</td>
                    <td><?php echo json_decode($_COOKIE["tiempoMenosDedicado"]) ?></td>
                </tr>
                <tr>
                    <td>tiempo mas dedicado</td>
                    <td><?php echo json_decode($_COOKIE["tiempoMasDedicado"]) ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="botones">
        <a class="btn btn-primary" href="http://localhost:8080/test/">Repetir encuesta</a>
        <a class="btn btn-primary my-5" href="http://localhost:8080/test/view/excel.php">Descargar resultados</a>
    </div>
    
    <script type="text/javascript">
        var xValues = <?php echo $_COOKIE["nombres"] ?>;
        var yValues = <?php echo $_COOKIE["valorNombre"] ?>;
        var barColors = ['green','blue', 'cyan','orange','brown'];
        
        new Chart("myChart", {
            type: "horizontalBar",
            data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: "Top 5 nombres mas usados"
                }
            }
        });

        var xValues = <?php echo $_COOKIE["generos"] ?>;
        var yValues = <?php echo $_COOKIE["valorGenero"] ?>;
        var barColors = ["red", "blue", "#2b5797", "#e8c3b9", "#1e7145"];

        new Chart("myChart2", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Genero de las personas encuestadas"
            }
        }
        });

        var xValues = <?php echo $_COOKIE["hobbys"] ?>;
        var yValues = <?php echo $_COOKIE["valorHobby"] ?>;
        var barColors = ["orange", "gray", "red", "blue", "gold", "blueviolet", "darkblue", "darkviolet", "goldenrod", "hotpink", "black"];

        new Chart("myChart3", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Hobbys elegidos"
            }
        }
        });

        var xValues = <?php echo $_COOKIE["tiempo"] ?>;
        var yValues = <?php echo $_COOKIE["valorTiempo"] ?>;
        var barColors = ["brown", "green", "cyan", "blue", "orange"];

        new Chart("myChart4", {
        type: "horizontalBar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Top de horas dedicadas al mes"
            }
        }
        });
    </script>
</body>
</html>