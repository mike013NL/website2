<?php

session_start();

$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = 'root';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Controleer of er een ID in de URL is doorgegeven
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verwijder de gebruiker uit de database
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);

    // Redirect terug naar de beheerpagina
    header('Location: admin.php');
    exit;
} else {
    // Redirect naar de beheerpagina als er geen ID is opgegeven
    header('Location: admin.php');
    exit;
}

