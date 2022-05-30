<?php
	require 'db_config.php';

    include 'authorization.php';
    if (!checkAuthorization()) {
        header('Location: home.php');
        exit;
    }

	header("Content-type: application/json");
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());
	
	$username = $_SESSION['username'];
	
	$out_query = "SELECT id_prodotto FROM carts WHERE username_utente = '$username'";
	$id = mysqli_query($conn,$out_query) or die("Errore query") ;

	$tshirts = array();

	
	if($id){
		while($row = mysqli_fetch_object($id))
		{
			$strqry2 = "SELECT * from tshirts WHERE id ='$row->id_prodotto' ";
			$dati_t = mysqli_query($conn,$strqry2) or die("Errore query") ;
			$tshirts[] = mysqli_fetch_object($dati_t);
	
		}
	}

	mysqli_free_result($id);
	mysqli_close($conn);
	echo json_encode($tshirts);
?>