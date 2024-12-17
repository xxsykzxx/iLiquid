<?php 

// Soubor pro připojení k DB
include_once 'db_connect.php';
include_once 'functions.php';

session_start();

print_r($_SESSION);

echo '<br>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Zkontroluj, jestli je košík v session
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        // košík je prázdný
        header('Location: cart.php?kosik=off');
    } else {
        $cart = $_SESSION['cart'];
        $status = 'Nový';
        $user = $_SESSION['user'];
        $person_office_id = SelectPersonoffices_id($_SESSION['user']);
        $total = TotalPrice() + YourDelivery($_SESSION['user']);
        $paid = 'False';
        date_default_timezone_set('Europe/Prague');
         $date = date("d.m.Y");
         $time = date("H:i:s");

        // Přidání objednávky do Orders
        if(AddOrder($status, $user, $person_office_id, $total, $paid, $date, $time)){
            // Získání posledního ID z OBJ
            $order_id = getLastOrderId();

            // Přidání všech řádků z OrdersRows
            if(AddOrdersRows($cart, $order_id)){
                // Vymažeme košík
                unset($_SESSION['cart']);
                header('Location: order-done.php');
                exit;
            }
        } else {
            echo 'špatně';
        }
        
    }

} else{
    // Neklik na dokončit
    header('Location: index.php');
    exit;
}

