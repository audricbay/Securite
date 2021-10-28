<?php
    session_start();
    if (isset($_POST['loginInput']) && isset($_POST['pwdInput'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "projet";

        //connecte 
        $conn = mysqli_connect($servername, $username, $password, $db);

        //test si aucune erreur
        if ($conn == false) {
            die("Connection failed");
        }    

        //on evite les injections SQL et XSS
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['loginInput'])); 
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwdInput']));

        //insertion dans la bdd du nouvel utilisateur avec cryptage sha1 pour le mdp 
        $query = "  INSERT INTO users VALUES
                    ('".$username."', '".sha1($password)."')";
        $exe_query = mysqli_query($conn, $query);

        echo $query;
        $_SESSION['inscrit'] = true;

        header('Location: connexion.php');
    }

    else {
        header('Location: connexion.php?error=2');
    }
    mysqli_close($conn);
?>