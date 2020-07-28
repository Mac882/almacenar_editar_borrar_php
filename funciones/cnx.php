<?php
    $conn = new mysqli('localhost', 'root' , '', 'cruz_bd');

    if ($conn->connect_error) {
        echo $error = $conn->connect_error;
    }else{
        // echo "conectado";
    }

?>