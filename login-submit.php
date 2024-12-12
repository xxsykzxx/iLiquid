<?php

include_once 'db_connect.php';
session_start();

function isLogin($name, $password) {

    $hashed_password = 

    $conn = DbConnection();

    // Připravíme SQL dotaz
    $sql = "
        SELECT Nick, Password FROM persons WHERE Nick = '$name'
    ";

    $result = $conn->query($sql);

    if ($result === false) {
        // Dotaz selhal, zobrazit chybovou hlášku
        echo "Chyba SQL: " . $conn->error;
    } else {
        // pokud najde shodu (je více než jeden řádek)
        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $hashed_password = $row["Password"];

            if (password_verify($password, $hashed_password)) {
                // heslo je správně
                $login = TRUE;
            } else {
                $login = FALSE;
            }
            
        } else if ($result->num_rows == 0) {
            $login = FALSE;
        }
    }

    return $login;
   
}



$name = $_POST["name"];
$password = $_POST["password"];

 echo 'login-submit.php';

// echo '<br>';

if(isLogin($name, $password)){
    //echo 'ano';
    $_SESSION['user'] = $name;
    $_SESSION['loged'] = true;

    //print_r($_SESSION);
    header('Location: index.php');
    exit;
} else {
    header('Location: login.php?loged=false');
    exit;
}   







