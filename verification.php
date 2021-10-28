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
        $query = "SELECT count(*) FROM users 
                where login = '".$username."' and pwd = '".sha1($password)."' ";
        $exe_query = mysqli_query($conn, $query);
        $response = mysqli_fetch_array($exe_query);
        $count = $response['count(*)'];
        if ($count != 0) {
            $_SESSION['connected'] = true;
            echo 'je suis là ';
            header('Location: connexion.php');
        }

        else {
            header('Location: connexion.php?error=1');
        }
    }
    else {
        header('Location: connexion.php?error=1');
    }
    mysqli_close($conn);
?>