<?php
session_start();

// Získání vstupních dat (JSON z AJAX požadavku)
$input = file_get_contents("php://input");
$data = json_decode($input, true);

error_log('Příchozí data: ' . print_r($data, true)); // Log dat z frontendu

if (isset($data['productId'])) {
    $productId = $data['productId'];

    // Inicializace košíku v session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Pokud produkt existuje, zvyšte množství, jinak přidejte produkt s množstvím 1
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += 1; // Přičítání množství
    } else {
        $_SESSION['cart'][$productId] = 1; // Přidání nového produktu s množstvím 1
    }

    // Výpočet celkového množství zboží v košíku
    $totalItems = array_sum($_SESSION['cart']);

    // Nastavení hlaviček a odpovědi
    header('Content-Type: application/json');

    // Odpověď na požadavek
    echo json_encode([
        'success' => true,
        'totalItems' => $totalItems
    ]);
    exit;
} else {
    error_log('Chyba: Neplatné ID produktu'); // Log chyby
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Neplatné ID produktu']);
    exit;
}


