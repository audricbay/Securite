<!DOCTYPE html>
<html>
    <head>
        <title>Une superbe page de connexion</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id = "logo"> 
            <img src = "logo.jpg" alt = "logo"/>
        </div>
        <form action = "verification.php" method = "POST"> 
            <div id = "loginDiv">
                <label>Login: </label>
                <input type = "text" name = "loginInput" id = "loginInput"/>
            </div>
            <div id = "pwdDiv">
                <label>Mot de passe: </label>
                <input type = "password" name = "pwdInput" id = "pwdInput"/>
            </div>
            <input type = "submit" value = "Se connecter"/>
            <input type = "reset" value = "reset"/>
            <input type = "submit" value = "s'inscrire" formaction="insertionBDD.php"/>
        </form>

    </body>
</html>

<?php
    session_start();
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
        echo 'connexion réussis';
    }
    if (isset($_SESSION['inscrit']) && $_SESSION['inscrit'] === true) {
        echo 'inscription réussis';
    }
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        if ($_GET['error'] == 1) {
            echo 'connexion échoué';
        }
        else echo 'inscription échoué';
    }
    session_destroy();
?>