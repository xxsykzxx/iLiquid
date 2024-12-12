<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$totalItems = array_sum($_SESSION['cart']);
echo json_encode(['totalItems' => $totalItems]);

?>
