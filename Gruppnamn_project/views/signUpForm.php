
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrera dig!</title>
</head>
<body>

<!--------------------Form för att registrera ny användare----------->


<h1> Registrera användare </h1>

<form method="POST" action="../handlers/registerForm.php">
Skriv ett användarnamn: <br />
<input type="text" name="username" /><br />
Skriv in ett lösenord: <br />
<input type="password" name="password" /><br />
Skriv in en email: <br />
<input type="email" name="email" /><br />

<input type="submit" name="Skapa konto!" /><br />

<a href="../views/loginForm.php">Redan medlem? Klicka här för att logga in!</a>
    
</body>
</html>