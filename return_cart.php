<?php
	require 'db_config.php';

    include 'authorization.php';
    if (checkAuthorization()) {
        header('Location: home.php');
        exit;
    }

	header("Content-type: application/json");
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());
	
	$userid = mysqli_real_escape_string($conn, $userid);
	$productid = mysqli_real_escape_string($conn, $_POST['productid']);
	
	$out_query = "SELECT * FROM tshirts WHERE id = $productid";
	$res = mysqli_query($conn, $out_query);

	if($res) {
		if (mysqli_num_rows($res) > 0) {
			$entry = mysqli_fetch_assoc($res);
			
			$returndata = array('ok' => true, 'team' => $entry['team'], 'url_copertina' => $entry['url_copertina'], 'prezzo' => $entry['prezzo']);

			echo json_encode($returndata);

			mysqli_free_result($res);
			mysqli_close($conn);
			exit;
		}
	}

	mysqli_free_result($res);
	mysqli_close($conn);
	$returndata = array('ok' => false);
	echo json_encode($returndata);
?>