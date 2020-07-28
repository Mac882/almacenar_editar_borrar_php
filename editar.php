<?php
   require_once('funciones/conexion.php'); 
?>

<!-- CAPTURAR EL ID -->
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>


<!-- CONEXION A LA BASE DE DATOS -->
<?php
        try {
            require_once('funciones/cnx.php');
        $sql = "SELECT * FROM contactos WHERE `id` = {$id}";
        $resultado = $conn->query($sql);
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
    <title>HOME</title>
  </head>
  <body>
    <div class="p-3 mb-2 bg-secondary text-white">
      <h1 class="text-uppercase text-center">Editar Contactos</h1> 
    </div>
    

    <div class="container col-6 mr-auto ml-auto align-content-center pb-3">
        
        <h2 class="text-uppercase lead">Nuevo Contacto</h2>

        <div class="border border-info">
            <form action="actualizar.php" method="get" class="m-3">
                <?php  while($registro = $resultado->fetch_assoc()) {?> <!-- EDITAR -->
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $registro['nombre']; ?>" name="nombre" id="nombre">
               
                </div>

                <div class="form-group">
                    <label for="numero">Numero Telefonico</label>
                    <input type="text" class="form-control" value="<?php echo $registro['telefono']; ?>" name="numero" id="numero" >
                  
                </div>
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <?php }?>  
            </form>
        </div>
    </div> <!-- end formulario -->
  
        <div>
            <?php
                $sql= "SELECT * FROM contactos WHERE `id` = {$id}";
                $result = mysqli_query(cnx(),$sql);
                

            ?>
        </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>