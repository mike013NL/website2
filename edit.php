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

    // Haal de gegevens van de gebruiker op
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleer of het formulier is verzonden
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $role = $_POST['role'];

        // Update de gebruiker in de database
        $stmt = $conn->prepare("UPDATE users SET username = :username, role = :role WHERE id = :id");
        $stmt->execute(['username' => $username, 'role' => $role, 'id' => $id]);

        // Redirect terug naar de beheerpagina
        header('Location: admin.php');
        exit;
    }
} else {
    // Redirect naar de beheerpagina als er geen ID is opgegeven
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker Bewerken</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2>Gebruiker Bewerken</h2>

<form method="POST">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

    <label for="role">Rol:</label>
    <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>" required><br><br>

    <input type="submit" value="Opslaan">
</form>

<a href="admin.php">Annuleren</a>
</body>
</html>
