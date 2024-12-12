<?php

session_start();

print_r($_SESSION);

// Pokud klikl na odhlásit -> Login = false
$login = $_GET['login'];

// odhlásit uživatele
if(isset($login) && ($_SESSION['loged'] === TRUE) ){
    unset($_SESSION['user']);
    $_SESSION['loged'] = false;
    
    header('Location: index.php');
    exit;
} else{
    header('Location: index.php');
    exit;
}

print_r($_SESSION);