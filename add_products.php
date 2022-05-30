<?php

	require 'db_config.php';

    include 'authorization.php';
    if (!checkAuthorization()) exit;

	$productid = urlencode($_GET['productid']); 
	$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

	$username = $_SESSION['username'];
	// $productid = mysqli_real_escape_string($conn, $_POST['productid']);
	$_SESSION['productid'] = $productid;
	

	$in_query = "INSERT INTO `carts`(`username_utente`, `id_prodotto`) VALUES ('$username','$productid')";

	$res = mysqli_query($conn, $in_query) or die(mysqli_error($conn));
	
	
	
    mysqli_close($conn);
?>