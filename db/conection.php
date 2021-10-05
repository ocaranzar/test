<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "encuesta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_POST['tiempo'] == ""){
  $sql = "INSERT INTO data (nombre, genero, hobby)
  VALUES ('{$_POST['nombre']}', '{$_POST['genero']}', '{$_POST['hobby']}')";
} else {
  $sql = "INSERT INTO data (nombre, genero, hobby, tiempo)
  VALUES ('{$_POST['nombre']}', '{$_POST['genero']}', '{$_POST['hobby']}', '{$_POST['tiempo']}')";
}

if ($conn->query($sql) === TRUE) {

  // nombre
  $sql = "SELECT nombre, COUNT(nombre) AS total from data group by nombre ORDER BY total DESC LIMIT 5;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $nombres[] = $row["nombre"];
      $valorNombre[] = $row["total"];
    }
  }

  setcookie("nombres", json_encode($nombres), time() + 86400, "/");
  setcookie("valorNombre", json_encode($valorNombre), time() + 86400, "/");

  // genero
  $sql = "SELECT genero, COUNT(*) as total FROM data GROUP BY genero;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      $generos[] = $row["genero"];
      $valorGenero[] = $row["total"];
    }
  }

  setcookie("generos", json_encode($generos), time() + 86400, "/");
  setcookie("valorGenero", json_encode($valorGenero), time() + 86400, "/");

  // hobby
  $sql = "SELECT hobby, COUNT(*) as total FROM data GROUP BY hobby;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      $hobbys[] = $row["hobby"];
      $valorHobby[] = $row["total"];
    }
  }

  setcookie("hobbys", json_encode($hobbys), time() + 86400, "/");
  setcookie("valorHobby", json_encode($valorHobby), time() + 86400, "/");

  // tiempo
  $sql = "SELECT tiempo, COUNT(*) as total FROM data WHERE tiempo IS NOT NULL GROUP BY tiempo ORDER BY total asc;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      
      $tiempo[] = $row["tiempo"];
      $valorTiempo[] = $row["total"];
    }
  }

  setcookie("tiempo", json_encode($tiempo), time() + 86400, "/");
  setcookie("valorTiempo", json_encode($valorTiempo), time() + 86400, "/");

  // resumen
  // total encuestados
  $sql = "SELECT COUNT(*) AS total from data;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $totalEncuestados = $row["total"];
    }
  }

  setcookie("totalEncuestados", json_encode($totalEncuestados), time() + 86400, "/");

  // nombre mas utilizado
  $sql = "SELECT nombre, COUNT(*) as total FROM data GROUP BY nombre ORDER BY total DESC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $nombreMasUtilizado = $row["total"];
    }
  }

  setcookie("nombreMasUtilizado", json_encode($nombreMasUtilizado), time() + 86400, "/");

  // total sin hobby
  $sql = "SELECT COUNT(*) AS total from data WHERE hobby = 'ninguno';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $totalSinHobby = $row["total"];
    }
  }

  setcookie("totalSinHobby", json_encode($totalSinHobby), time() + 86400, "/");

  // total con hobby
  $sql = "SELECT COUNT(*) AS total from data WHERE hobby != 'ninguno';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $totalConHobby = $row["total"];
    }
  }

  setcookie("totalConHobby", json_encode($totalConHobby), time() + 86400, "/");

  // hobby mas elegido
  $sql = "SELECT hobby, COUNT(*) as total FROM data GROUP BY hobby ORDER BY total DESC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $hobbyMasElegido = $row["hobby"];
    }
  }

  setcookie("hobbyMasElegido", json_encode($hobbyMasElegido), time() + 86400, "/");

  // hobby menos elegido
  $sql = "SELECT hobby, COUNT(*) as total FROM data GROUP BY hobby ORDER BY total ASC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $hobbyMenosElegido = $row["hobby"];
    }
  }

  setcookie("hobbyMenosElegido", json_encode($hobbyMenosElegido), time() + 86400, "/");

  // mujeres encuestadas
  $sql = "SELECT genero, COUNT(*) as total FROM data where genero = 'mujer';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $mujerEncuestadas = $row["total"];
    }
  }

  setcookie("mujerEncuestadas", json_encode($mujerEncuestadas), time() + 86400, "/");

  // hombres encuestados
  $sql = "SELECT genero, COUNT(*) as total FROM data where genero = 'hombre';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $hombreEncuestados = $row["total"];
    }
  }

  setcookie("hombreEncuestados", json_encode($hombreEncuestados), time() + 86400, "/");

  // tiempo menos dedicado
  $sql = "SELECT tiempo, COUNT(*) as total FROM data WHERE tiempo IS NOT NULL GROUP BY tiempo ORDER BY total ASC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $tiempoMenosDedicado = $row["tiempo"];
    }
  }

  setcookie("tiempoMenosDedicado", json_encode($tiempoMenosDedicado), time() + 86400, "/");

  // tiempo mas dedicado
  $sql = "SELECT tiempo, COUNT(*) as total FROM data WHERE tiempo IS NOT NULL GROUP BY tiempo ORDER BY total DESC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $tiempoMasDedicado = $row["tiempo"];
    }
  }

  setcookie("tiempoMasDedicado", json_encode($tiempoMasDedicado), time() + 86400, "/");

  // todo
  $sql = "SELECT * FROM data";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $todo[] = array($row["nombre"], $row["genero"], $row["hobby"], $row["tiempo"]);
    }
  }

  
  setcookie("todo", json_encode($todo), time() + 86400, "/");
  
  header('Location: https://php-tga.herokuapp.com/test/view/view2.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();