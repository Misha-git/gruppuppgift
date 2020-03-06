<?php 

    include("../includes_partials/database_connection.php");

    //$title = $_POST['title'];
    //$description = $_POST['description'];

    //$query = "INSERT INTO posts (title, description) VALUES('$title', '$description');"; //tar värdena från tabellen
    //$return = $dbh->exec($query);

    $min_sql_query = "INSERT INTO posts (description, title) VALUES('{$_POST['description']}', '{$_POST['title']}');";
    $result = $dbh->exec($min_sql_query);

    if($result) {
        header("location:./allPosts.php"); 

    } else {
        echo "Något blev fel!";
    }

?>