<?php

    require 'db_config.php';

    include 'authorization.php';
    if (checkAuthorization()) {
        header('Location: home.php');
        exit;
    }
    
    // Verifica che i campi siano riempiti
    if(!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["conf_password"]))
    {
        //Creo un array contente tutti gli errori
        $error = array();
        // Connetti al database
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Errore: ".mysqli_connect_error());

        // Escape input
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email'])); // Con strtolower() rendo tutti i caratteri minuscoli
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // CONTROLLO USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,20}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            // Cerco se lo username esiste già o se appartiene a una delle 3 parole chiave indicate
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già in uso";
            }
        }

        // CONTROLLO EMAIL
        //Metto un filtro per controllare la validità dell'email
        //In particolare, Il filtro FILTER_VALIDATE_EMAIL convalida un indirizzo e-mail
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $query = "SELECT email FROM users WHERE email = '$email'";
            $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Esiste già un account associato a quest'E-mail";
            }
        }

        // CONTROLLO PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }

        // CONTROLLO CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["conf_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        // REGISTRAZIONE UTENTE NEL DATABASE
        if(count($error) == 0) { //Se non ci sono errori
            // Crittografia password
            $password = password_hash($password, PASSWORD_BCRYPT);
            // Inserimento utente nel database
            $query = "INSERT INTO users(name, surname, username, email, password)
                      VALUES('$name', '$surname', '$username', '$email', '$password')";            
            if(mysqli_query($conn, $query)) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = mysqli_insert_id($conn);
                mysqli_free_result($res);
                mysqli_close($conn);
                header("Location: home.php");
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_free_result($res);
        mysqli_close($conn);
    } else if (isset($_POST["username"])) {
        $error = "Riempi tutti i campi";
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log_reg.css">
    <script src="registrtion.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Social nel footer-->
    <title>Registrazione | AR SPORT</title>
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
                <h2>Registrati</h2>
                <form name='login' method='post'>

                    <div class="name control">
                        <label><input type='text' name='name' placeholder="Nome" <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> ></label>
                    </div>
                    <div class="surname control">
                        <label><input type='text' name='surname' placeholder="Cognome" <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ></label>
                    </div>
                    <div class="username control">
                        <label><input type='text' name='username' placeholder="Nome utente" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> ></label>
                        <p></p>
                    </div>
                    <div class="email control">
                        <label><input type='text' name='email' placeholder="E-mail" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?> ></label>
                        <p></p>
                    </div>
                    <div class="password control">
                        <label><input type='password' name='password' placeholder="Password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> ></label>
                        <p></p>   
                    </div>
                    <div class="conf_password control">
                        <label><input type='password' name='conf_password' placeholder="Conferma password" <?php if(isset($_POST["conf_password"])){echo "value=".$_POST["conf_password"];} ?> ></label>
                        <p></p> 
                    </div>
                    <div class="control">
                        <input type="submit" value="Invia">    
                    </div>
                    
                </form>
                <p>Hai già un account? <a href="login.php">Accedi</a></p>
                </div>
        </main>

        <?php require 'footer.php'; echo $footer ?>
    </body>

</html>