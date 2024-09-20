<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h2>Inloggen</h2>
<form action="login.php" method="post">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" required><br>
    <label for="password">Wachtwoord:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Inloggen</button>
</form>
<?php
session_start();

$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = 'root';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();

    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_data && password_verify($pass, $user_data['password'])) {
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['role'] = $user_data['role'];

        if ($user_data['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: home.php");
        }
        exit();
    } else {
        echo "Onjuiste gebruikersnaam of wachtwoord.";
    }
}
?>


</body>
</html>
