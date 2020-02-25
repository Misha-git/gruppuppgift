<?php 

    include("../includes_partials/database_connection.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email');"; //tar värdena från tabellen
    $return = $dbh->exec($query);


    if( !$return) {
    print_r($dbh->errorInfo());

    } else {
        header("location:../index.php");
    }

?>