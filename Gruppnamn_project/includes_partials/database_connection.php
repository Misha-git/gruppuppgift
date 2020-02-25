<?php 

//PHP Settings 

    $host   ="localhost";
    $user   ="root";
    $pass   ="";
    $db     ="blogg";

//Make connection
    try { //allt du skriver i en try, kommer den att försöka göra. Om det inte går så kommer catch fånga felet. 

        $dsn = "mysql:host=$host;dbname=$db;"; //
        $dbh = new PDO($dsn, $user, $pass); //data base handler

        } catch (PDOException $e) { //skapar anslutning
        
//On error

        echo "Error!" .  $e->getMessage() . "<br />"; //skriver ut felet och stänger ner appen. 
        die;
    }
?>