<?php 

    /*include("../includes_partials/database_connection.php");

    //---------------- Lista med alla posts ---------------------

    $min_sql_query = "SELECT id, title, description, posted_date FROM posts";
    $result = $dbh->query($min_sql_query);
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

        echo "<p>";
        echo "<h1><a href='handlers/post.php?id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";
        echo "</p><hr />";

    }
    */

    //-------------Om man loggar in som admin eller user så ser man olika listor------------------
    //session_start();
    if(isset($_SESSION['username'])) {
        if($_SESSION['role'] == "admin") { //------------Loggar in som ADMIN
            include("views/header.php");

            $min_sql_query = "SELECT id, title, description, posted_date FROM posts";
            $result = $dbh->query($min_sql_query);
            foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

            echo "<p>";
            echo "<h1><a href='handlers/post.php?id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";
            echo "</p><hr />";
            }
            
        } else {                           //-------------Loggar in som USER
            echo "<h1>Hej " . $_SESSION['username'] . "!</h1><br />";
            include("views/headerUser.php");

            $min_sql_query = "SELECT id, title, description, posted_date FROM posts";
            $result = $dbh->query($min_sql_query);
            foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

            echo "<p>";
            echo "<h1><a href='handlers/postUser.php?id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";
            echo "</p><hr />";
            
        }
    
    } 
}
    

?>