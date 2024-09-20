<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h2>Registreren</h2>
<form action="register.php" method="post">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" required><br>
    <label for="password">Wachtwoord:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Registreren</button>
</form>
<?php

$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = 'root';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Gebruikersnaam bestaat al!";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':password', $pass);

        if ($stmt->execute()) {

            header("Location: login.php");
            exit();
        } else {
            echo "Er is een fout opgetreden.";
        }
    }
}
?>


</body>
</html>
