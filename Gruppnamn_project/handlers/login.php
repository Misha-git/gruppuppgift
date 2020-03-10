<?php

        include("../includes_partials/database_connection.php");

        //------------Felmeddelanden vid inlogg----------------

        $username    = (!empty($_POST['username']) ? $_POST['username'] : ""); // om tom = tom string
        $password    = (!empty($_POST['password']) ? $_POST['password'] : ""); //empty kollar "är den här satt och har den något värde?"

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $errors = false; //bool
        $errorMessages = "";

        //------Om man lämnar fälten tomma---------------

        if(empty($username)) { //Om den är tom: 
                $errorMessages .= "Du måste skriva ett användarnamn! <br />";
                $errors = true;
                }
        
                    if (empty($password)) {
                    $errorMessages .= "Du måste skriva ett namn! <br />";
                    $errors = true;
                    }


    print_r($_POST);

    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = "SELECT id, username, role, password FROM users WHERE username='$username' AND password='$password'";
    $return = $dbh->query($query);
    $row = $return->fetch(PDO::FETCH_ASSOC);

    if(empty($row)) {
        header("location:../views/loginForm.php?err=true"); //ber headern att ändra vart den ska. Inbyggd funktion

    } else {

        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password']; //session är en global variabel. 
        $_SESSION['role']     = $row['role'];

        header("location:../index.php"); //skickar tillbaka användaren till startsidan //Fungerar som den ska!
    
    }

    ?>