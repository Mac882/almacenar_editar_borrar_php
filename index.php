<?php
   require_once('funciones/conexion.php'); 
?>

<!-- CONEXION A LA BASE DE DATOS -->
<?php

try {
    require_once('funciones/cnx.php');
    $sql = "SELECT * FROM contactos";
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
      <h1 class="text-uppercase text-center">contactos</h1> 
    </div>
    

    <div class="container col-6 mr-auto ml-auto align-content-center pb-3">
        

        <div class="contenido border border-info">
            <h2 class="text-uppercase lead">Nuevo Contacto</h2>
        
            <form action="crear.php" method="post" class="m-3">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tu nombre">
               
                </div>

                <div class="form-group">
                    <label for="numero">Numero Telefonico</label>
                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Tu numero">
                  
                </div>
                
                <button type="submit" class="btn btn-primary">Agregar</button>
                <?php
              
                ?>
            </form>
        </div>
    </div>
    
    <div class="container col-8">
     
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>
        <?php
            // $sql= "SELECT * FROM contactos";
            // $result = mysqli_query(cnx(),$sql); //ncx funcion de conexion
          
       
        while($registros = $resultado->fetch_assoc()) { ?>
       
            <tr>
             
              <td><?php echo $registros['nombre'] ?></td>
              <td><?php echo $registros['telefono'] ?></td>
              <td> <!-- Editar envia el "id" a la otra pagina -->
              <a class="btn btn-primary" href="editar.php?id=<?php echo $registros['id']; ?>" role="button">Editar</a>
              </td>
              <td> <!-- Borrar -->
              <a class="btn btn-danger" href="borrar.php?id=<?php echo $registros['id']; ?>" role="button">Borrar</a>
              </td>
            </tr>
         
        <?php }  ?>  
        </tbody>
      </table>
    </div>

 




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>