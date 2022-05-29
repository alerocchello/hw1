<?php

    require 'db_config.php';
    
    include 'authorization.php';
    if (checkAuthorization()) {
        header('Location: home.php');
        exit;
    }

    // Verifica l'esistenza di dati POST
    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $query = "SELECT * FROM users WHERE $searchField = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {

            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {
                $_SESSION["username"] = $entry['username'];
                $_SESSION["surname"] = $entry['cognome'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='log_reg.css'>
        <script src='login.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
        <title>Accesso | AR SPORT</title>
    </head>
    <body>
        <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<span class='error'>$error</span>";
            }
        ?>

        <h1 id="logo">ar sport</h1>
        <main>
            <div class="form_container">
                <h2>Accedi</h2>
                <form name='login' method='post'>

                    <div class="control">
                        <label><input type='text' name='username' placeholder="Nome utente"></label>
                    </div>
                    <div class="control">
                        <label><input type='password' name='password' placeholder="Password"></label>    
                    </div>
                    <span><input type="checkbox"> Ricordami</span>
                    <div class="control">
                        <input type="submit" value="Invia">
                    </div>
                    
                </form>
                <p>Non hai ancora un account? <a href="registration.php">Registrati</a></p>
                </div>
        </main>

        <?php require 'footer.php'; echo $footer ?>
    </body>
</html>