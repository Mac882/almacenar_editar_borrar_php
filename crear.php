<!-- CONEXION.PHP -->

<?php
require_once('funciones/conexion.php');
?>

<!-- DECLARAR VARIABLES PARA CAPTURAR VALORES DE INDEX -->
<?php
  if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    // var_dump($nombre);
  }

  if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    // var_dump($numero);
  }

?>
   <!-- /* verificar numero devuelve falso si no tiene nada  */ -->
<?php

  $sql_verificar = 'select * from contactos where contactos.telefono = ?';
  $sentencia = $pdo->prepare($sql_verificar);
  $sentencia->execute(array($numero));
  $resultado = $sentencia->fetch(); //fetch solo devuelve un resultado

?>

<!-- CONEXION A LA BASE DE DATOS -->
<?php
try {
require_once('funciones/cnx.php');
 $sql = "INSERT INTO `contactos` (`nombre`,`telefono`) ";
 $sql .= "VALUES ('{$nombre}', '{$numero}')";
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
           if (!$resultado) { /* sie en verdadero */
         
              //  echo 'Numero no registrado';
               $resp = $conn->query($sql);
              if ($resp) {
                echo "Contacto Creado";
              } else {
                echo "error" . $conn->error;
              }
                
           }else {
             echo "Numero Ya Registrado";
           }
      /* AGREGAR USUARIO */

       
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