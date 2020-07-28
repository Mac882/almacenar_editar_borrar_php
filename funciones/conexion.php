<?php
 $enlace = 'mysql:host=127.0.0.1;dbname=cruz_bd';
 $usuario = 'root';
 $pass ='';

 try {
     $pdo = new PDO($enlace,$usuario,$pass); //coneccion
    //  echo 'conectado perros';
   
    } catch (PDOException $e) { //propio de PDO mensiona si hay error
        print "¡Error jajajaj!: " . $e->getMessage() . "<br/>";
        die();
 }

?>

<?php 
		 function cnx(){
		 	$servidor="localhost";
		 	$usuario="root";
		 	$password="";
		 	$bd="cruz_bd";

		 	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

		 	return $conexion;
		 }

 ?>