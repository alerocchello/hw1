<?php include 'authorization.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page | AR Sport</title>
    <link rel="stylesheet" href="store.css">
    <script src="side_menu.js" defer></script>
    <script src="store.js" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anybody&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>

    <?php require 'side_menu.php'; echo $side_menu ?>

    <nav>
        <h1 id="logo">AR sport</h1>
        <form id="search_team" method="GET">
            <input type='text' name="team" id="team" placeholder="Nome squadra">
            <input type="submit" value="Invia" id="submit">
        </form>
        <button><img src="./images/carrello.png" id="iconcart"> Carrello</button>
    </nav>

    <div id="intro">
        <h2>store</h2>
        <span>Acquista la maglietta della tua squadra del cuore</span>
    </div>
    
    <div id="divstore"></div>

    <?php require 'footer.php'; echo $footer ?>

</body>

</html>