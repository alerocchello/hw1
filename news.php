<?php include 'authorization.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page | AR Sport</title>
    <link rel="stylesheet" href="news.css">
    <script src="side_menu.js" defer></script>
    <script src="news.js" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anybody&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>

    <?php require 'header.php'; echo $header ?>
    <?php require 'side_menu.php'; echo $side_menu ?>

    <a href="news.php" class="title">Tutte le ultime notizie</a>
    <div id="news"></div>

    <?php require 'footer.php'; echo $footer ?>

</body>

</html>