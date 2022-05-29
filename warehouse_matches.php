<?php

    require 'db_config.php';

    header("Content-type: application/json");

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

    $query = "SELECT * FROM matches";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    $matches = array();
    while($row=mysqli_fetch_assoc($res)){
        $matches[]=$row; //legge il match e lo mette alla fine della lista
    }

    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($matches);
    
?>
