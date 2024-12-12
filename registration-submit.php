<?php


session_start();
include_once 'functions.php';

$nickname = htmlspecialchars(filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING));
$password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
$password2 = htmlspecialchars(filter_input(INPUT_POST, 'password2'));
$email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$firstname = htmlspecialchars(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
$surname = htmlspecialchars(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
$address = htmlspecialchars(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING));
$city = htmlspecialchars(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
$psc = htmlspecialchars(filter_input(INPUT_POST, 'psc', FILTER_SANITIZE_NUMBER_INT));
$phone = htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));

$selected_delivery = $_POST["delivery_method"];




//echo 'NICK: ' . $nickname;

print_r($_POST);

echo '<br>';



//echo $selected_delivery;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // pokud si vybral osobní předání
    if(isset($_POST['osobni'])){
        $delivery = 0;
    } else{
        $delivery = 30;
    }



    //echo 'Je post';
    //if (!empty($nickname) && !empty($password) && !empty($password2) && !empty($email) && !empty($firstname) && !empty($surname) && !empty($address) && !empty($city) && !empty($psc) && !empty($phone)) {
        if($password == $password2){

            // Zahešované heslo
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Pokud se provede INSERT do "persons"
            IF(AddRegistration($firstname, $surname, $nickname, $password_hash, $phone, $email,$delivery)){

                // Pokud se v pořádku přidá provozovna do 'personoffices', která se váže k osobě .. SelectIdRegistration - vyhledá aktuální ID osoby, která se nyní registrovala
                if(AddResidence($address, $city, $psc, SelectIdRegistration($nickname))){
                    //echo 'AddResidence';
                    header('Location: login.php?reg=true');
                    exit;
                } else {
                    header('Location: registration.php?reg=AddRes');
                }
            } else {
                header('Location: registration.php?reg=AddReg');
            }

            exit;
            
            
        } else {
            //echo 'heslo se neshoduje';
            header('Location: registration.php?reg=pass');
            exit;
        }
    //} else{
    //    //header('Location: registration.php?loged=false');
    //    exit();
    //}




} else {
    //echo 'chyba';
    header('Location: registration.php?loged=false');
    exit();
}