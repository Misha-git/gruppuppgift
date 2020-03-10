<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1> Logga in! </h1>

<form method="POST" action="../handlers/login.php"> <!-- Fungerar som den ska-->
    <b>Användarnamn:</b> <br />
    <input type="text" name="username"/> <br />
    <b>Lösenord:</b> <br />
    <input type="password" name="password" /> <br />
    <input type="submit" value="Logga in" />

</form>

<?php
session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel" : "" );
?>

<hr />

    <b>Inte medlem?</b><br /> 
    <a href="../views/signUpForm.php">Registrera dig!</a>
</body>
</html>