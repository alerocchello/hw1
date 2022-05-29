<?php

    require 'db_config.php';

    header("Content-type: application/json");

    session_start();

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

    $team = urlencode($_GET['team']);

    $query = "SELECT * FROM tshirts WHERE team = '$team'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    $products = array();
    while($row=mysqli_fetch_assoc($res)){
        $products[]=$row; //legge il prodotto e lo mette alla fine della lista
    }

    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($products);
    
?>