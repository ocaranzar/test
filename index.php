<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://localhost:8080/test/js/main.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <style>
            body {
                /* background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); */
                background-color: #e5eeea;
            }
        </style>
        <title>Formulario</title>
    </head>
    <body>

        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center fs-4">
                    Formulario
                </div>

                <div class="card-body">
                    <form action="https://php-tga.herokuapp.com/test/db/conection.php" method="post">
                        <div class="input-group row row-cols-3 my-4">
                            <label for="nombre" class="form-label col text-end pe-5 fs-5">Nombre :</label>
                            <input type="text" class="form-control col-2 me-5 rounded-3" name="nombre" id="nombre" autofocus required>
                        </div>
                        <div class="input-group row row-cols-3 my-4">
                            <label for="genero" class="form-label col text-end pe-5 fs-5">Genero :</label>
                            <div class="col-2 me-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="mujer" value="mujer" checked>
                                    <label class="form-check-label fw-bold" for="mujer">
                                        Mujer
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="hombre" value="hombre">
                                    <label class="form-check-label fw-bold" for="hombre">
                                        Hombre
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group row row-cols-3 my-4">
                            <label for="hobby" class="form-label col text-end pe-5 fs-5">¿Tienes algún hobby? :</label>
                            <select name="hobby" id="hobby" class="form-select col-2 me-5 rounded-3" onchange="myFunction()">
                                <option id="valueNinguno" value="ninguno">Ninguno</option>
                                <option value="deporte">Deporte</option>
                                <option value="musical">Musical</option>
                                <option value="cocina">Cocina</option>
                                <option value="literario">Literario</option>
                                <option value="manualidades">Manualidades</option>
                                <option value="juegos">Juegos</option>
                                <option value="modelismo">Modelismo</option>
                                <option value="baile">Baile</option>
                                <option value="cine">Cine</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="input-group row row-cols-3 my-4">
                            <label for="tiempo" class="form-label col text-end pe-5 fs-5">¿Cuánto tiempo le dedicas al mes? :</label>
                            
                            <select name="tiempo" id="tiempo" class="form-select col-2 me-5 rounded-3" disabled>
                                <option value="">Seleccione solo si tiene hobby</option>
                                <option value="menos de 5 hrs">menos de 5 Hrs</option>
                                <option value="entre 5 y 15 hrs">entre 5 y 15 Hrs</option>
                                <option value="entre 15 y 25 hrs">entre 15 y 25 Hrs</option>
                                <option value="mas de 25 hrs">mas de 25 Hrs</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>