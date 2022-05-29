<?php include 'authorization.php'; ?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page | AR Sport</title>
		<link rel="stylesheet" href="home.css">
		<script src="nba.js" defer></script>
		<script src="side_menu.js" defer></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Anybody&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
	</head>
	<body>
		
		<?php require 'header.php'; echo $header ?>
		<?php require 'side_menu.php'; echo $side_menu ?>

		<?php

			// API REST DA PHP
			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://nba-teams2.p.rapidapi.com/NBA",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: nba-teams2.p.rapidapi.com",
					"X-RapidAPI-Key: 4bfcc78970mshce645f492d886cdp172b44jsn1426c44f320c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo "<h1>Elenco delle squadre attualmente presenti in NBA</h1>";
				echo $response;
			}

		?>

		<!-- API REST DA JS -->
		<form id="search_player">
		<h2>Scrivi nome e cognome di un giocatore NBA per leggere i suoi dati</h2>
		<div>
			<input type="text" id="player"/>
			<input type="submit" value="Cerca">
			<div id="players-view"></div>
		</div>
		</form>

		<?php require 'footer.php'; echo $footer ?>
		
	</body>
</html>