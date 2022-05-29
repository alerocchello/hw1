<?php include 'authorization.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page | AR Sport</title>
    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer></script>
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

    <section>

        <a href="news.php" class="link_statistics_title">Ultime notizie</a>
        <h2>News, approfondimenti e il meglio dello sport</h2>
        <div id="news"></div>
        
        <a href="matches.php" class="link_statistics_title" id="second">Eventi sportivi più attesi</a>
        <div id="buttons2">
            <a class="button">Acquista biglietti</a>
            <a class="button">TV e streaming</a>
        </div>
        
        <div id="events"></div>

        <img src="./images/spotify.png" id="logo_spotify">
        <form id="spotify">            
            <h2>Scrivi il nome e scegli un album musicale<br>
                Noi lo riprodurremo in sottofondo</h2>
            <input type="text" id="album" />
            <input type="submit" value="Cerca">
            <div id="album-view"></div>
        </form>

    </section>

    <?php require 'footer.php'; echo $footer ?>

</body>

</html>