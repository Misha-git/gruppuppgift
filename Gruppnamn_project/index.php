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

session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel" : "" );

    if(isset($_SESSION['username'])) {
        if($_SESSION['role'] == "admin") {
    
            echo "<h1>Välkommen!</h1>";
            echo "<h1>Du är admin!</h1>";
            include("views/header.php");
        } else {
        //header("location:views/userPage.php");
            echo "<h1>Välkommen!</h1>";
            echo "<h1>Hej " . $_SESSION['username'] . "!</h1><br />";
            include("views/headerUser.php");
        }

    } 

    ?>

<?php 

include("handlers/pages.php");

?>


    
</body>
</html>