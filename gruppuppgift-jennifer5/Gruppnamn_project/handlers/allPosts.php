
<?php

include("classes/Posts.php");


    //----------------------Alla inlägg på rad----------------

    if(isset($_SESSION['username'])) {
        if($_SESSION['role'] == "admin") { //------------Vad man ser om man loggar in som ADMIN

            $min_sql_query = "SELECT id, title, description, posted_date FROM posts";
            $result = $dbh->query($min_sql_query);
            foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

            echo "<p>";
            echo "<h1><a href='./index.php?page=post&id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";
            echo "</p><hr />";
            }
            
        } else {                           //------------- Vad man ser om man loggar in som USER
            if($_SESSION['role'] == "user") {
        
            $min_sql_query = "SELECT id, title, description, posted_date FROM posts";
            $result = $dbh->query($min_sql_query);
            foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

            echo "<p>";
            echo "<h1><a href='./index.php?page=postUser&id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";
            echo "</p><hr />";
            }
        }
    } 
}
?>