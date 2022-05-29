<?php

	require 'db_config.php';

    include 'authorization.php';
    if (!$userid = checkAuthorization()) exit;
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

	$userid = mysqli_real_escape_string($conn, $userid);
	$productid = mysqli_real_escape_string($conn, $_POST['productid']);
	$in_query = "INSERT INTO carts(id_utente, id_prodotto) VALUES($userid, $productid)";

	$res = mysqli_query($conn, $in_query);
	
	mysqli_free_result($res);
    mysqli_close($conn);
?>