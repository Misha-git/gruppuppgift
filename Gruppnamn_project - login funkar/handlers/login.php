<?php 

    include("../includes_partials/database_connection.php"); //inkludera databasfil
    
    print_r($_POST);

    //$username    = (!empty($_POST['username']) ? $_POST['username'] : ""); // om tom = tom string
    //$password    = (!empty($_POST['password']) ? $_POST['password'] : "");
    $username = $_POST['username'];
    $password = md5($_POST['password']); //krypterad med hjälp av mb5, så att vi slipper skriva in den krypterade koden
    $email = $_POST['email'];

    //$query = "INSERT INTO users (username, password) VALUES('$username', '$password');"; //tar värdena från tabellen
    $query = "SELECT id, username, role, password FROM users WHERE username='$username' AND password='$password'";


    //$return = $dbh->exec($query);
    $return = $dbh->query($query);

    //print_r($return->errorInfo());

    $row = $return->fetch(PDO::FETCH_ASSOC); 

    if(empty($row)) {
        header ("location:index.php?err=true"); //ber headern att ändra vart den ska. Inbyggd funktion
        echo "Du kunde inte logga in!";
    } else {
        echo "Du kan logga in";

        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password']; //session är en global variabel. 
        $_SESSION['role']     = $row['role'];

        header ("location:../index.php"); //skickar tillbaka användaren till startsidan
    }
    
?>