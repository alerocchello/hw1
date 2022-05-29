<?php

//Controllo che lo username sia unico
if (isset($_GET["q"])) {
    require 'db_config.php';
    
    header("Content-type: application/json"); //invia l'intestazione http json al browser per informarlo sul tipo di dati che si aspetta, in questo caso json
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    
    $username = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "SELECT username FROM utente WHERE username = '$username'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false)); //Se l'utente esiste ritorna true altrimenti false
    mysqli_free_result($res);
    mysqli_close($conn);

} else {
    echo "Errore";
    exit;
}

?>
