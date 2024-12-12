<?php
header('Content-Type: application/json');

// Získání dat z formuláře
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$delivery = filter_var($_POST['delivery'], FILTER_VALIDATE_BOOLEAN);
$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$zip = $_POST['zip'] ?? '';

// Validace vstupu
if (empty($name) || empty($email)) {
    echo json_encode(['message' => 'Jméno a e-mail jsou povinné.']);
    http_response_code(400);
    exit;
}

if ($delivery && (empty($address) || empty($city) || empty($zip))) {
    echo json_encode(['message' => 'Adresní údaje jsou povinné pro doručení.']);
    http_response_code(400);
    exit;
}

// Zpracování objednávky
// (zde můžete implementovat ukládání do databáze nebo zasílání e-mailu)

$response = [
    'message' => $delivery
        ? 'Objednávka bude doručena na zadanou adresu.'
        : 'Objednávka bude připravena k osobnímu odběru.',
];
echo json_encode($response);
?>
