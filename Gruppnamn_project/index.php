<?php

    include("includes_partials/database_connection.php"); //inkludera databasfil

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>

<?php 

include("views/header.php");

?>

<?php 
    session_start();
    echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel" : "" );

    if(isset($_SESSION['username'])) {
        if($_SESSION['role'] == "admin") {
            echo "<h1>Du är admin!</h1>";
            echo "<a href='adminPage.php'>Adminpanelen</a>";
        } else {
            echo "<h1>Du är inte admin</h1>";
        }
        echo "Hej " . $_SESSION['username'] . "!<br />";
        echo '<a href="handlers/logout.php">Logga ut!</a>';
    
    } else {
        include('views/loginForm.php');
        echo '<a href="views/signUpForm.php">Registrera!</a>';  
    }
?>


    
</body>
</html>