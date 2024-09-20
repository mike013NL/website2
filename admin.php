<?php
session_start();

$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = 'root';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="style.css" rel="stylesheet">
    <style>
        body{
            background-color: skyblue;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.5);
            z-index: 100;

        }

        nav .logo {
            width: 60px;
            height: 60px;
            animation: rotate 10s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        nav ul {
            display: flex;
            align-items: center;
        }

        nav ul li {
            list-style: none;
            margin-left: 48px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 17px;
        }
        a{
            text-decoration: none;
        }
        h2{
            margin-bottom: 250px;
            margin-left: 100px;
            position: absolute;
        }
        @media only screen and (max-width: 600px) {

        h2 {
            margin-bottom: 400px;
            margin-left: -15px;
        }
            .form{
                margin-top: 500px;
                margin-left: -50px;
            }
        }
    </style>
</head>
<body>
<nav>
    <div class="logo">
        <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="whiteFilter">
                    <feColorMatrix type="matrix" values="1 0 0 0 0
                                           0 1 0 0 0
                                           0 0 1 0 0
                                           0 0 0 1 0"/>
                    <feComponentTransfer>
                        <feFuncR type="table" tableValues="1 1"/>
                        <feFuncG type="table" tableValues="1 1"/>
                        <feFuncB type="table" tableValues="1 1"/>
                    </feComponentTransfer>
                </filter>
            </defs>
            <image href="plane_9634723.png" x="0" y="0" width="60" height="60" filter="url(#whiteFilter)"/>
        </svg>
    </div>
    <ul>
        <li><a href="home.php">HOME</a></li>
        <li><a href="admin.php">GEGEVENSBEHEER</a></li>
    </ul>
</nav>
<h2>Welkom</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Gebruikersnaam</th>
        <th>Rol</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="edit.php?id=<?= $user['id'] ?>">Bewerken</a>
                <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<form class="form" method="post" enctype="multipart/form-data">
    <button type="submit" name="backup">Backup maken</button>
    <br><br>
    <button type="submit" name="restore">Backup terugzetten</button>
</form>

</body>
</html>
