
<!-- DECLARAR VARIABLES PARA CAPTURAR VALORES DE INDEX -->
<?php
  if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    // var_dump($nombre);
  }

  if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];
    // var_dump($numero);
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // var_dump($numero);
  }

?>

<!-- CONEXION A LA BASE DE DATOS -->
<?php
try {
require_once('funciones/cnx.php');
$sql = "UPDATE `contactos` SET `nombre`= '{$nombre}', `telefono` = '{$numero}' WHERE `id` = '{$id}' ";
$resp = $conn->query($sql); /* ACA SE EJECUTA */
 
//  $resp = $conn->query($sql);
 
} catch (Exception $e) {
   $error = $e->getMessage();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>CREAR</title>
  </head>
  <body>
    <div class="p-3 mb-2 bg-secondary text-white">
      <h1 class="text-center">Agenda Contacto</h1>
    </div>


  <div class="container">
      
<?php        
           
            if ($resp) {
                echo "Contacto Actualizado";
              } else {
                echo "error" . $conn->error;
              }
                
?>
    </div>
    <a class="btn btn-primary" href="index.php" role="button">Regresar</a>
        <?php
        /* cerrar conexion */
            $conn->close();

        ?>



    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>