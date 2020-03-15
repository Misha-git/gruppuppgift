<?php

    include("../includes_partials/database_connection.php");

    //-------POST kollar mot databasen om användarnamn + password finns 

    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = "SELECT id, username, role, password FROM users WHERE username='$username' AND password='$password'";
    $return = $dbh->query($query);
    $row = $return->fetch(PDO::FETCH_ASSOC);

    
    //----------Om den inte hittar rad så visas felmeddelande-----------

    if(empty($row)) {
        header("location:../views/loginForm.php?err=true");


    //------------Vid lyckad inloggning startar en session--------------
    } else {

        session_start();

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password']; 
        $_SESSION['role']     = $row['role'];
        $_SESSION['user_id']  = $row['id'];

        header("location:../index.php"); 
    
    }

    ?>