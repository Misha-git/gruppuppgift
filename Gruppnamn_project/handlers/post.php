<?php 

//--------------------Sidan visar inlägg efter att ha tryckt på listan ----------------

include("classes/Posts.php");
include("includes_partials/database_connection.php");


//---------------------------------Hämtar inlägg från class 
$Posts = new GBPost($dbh);

$Posts->fetchAll();

$min_sql_query = "SELECT id, title, description, posted_date, picture FROM posts WHERE id={$_GET['id']}";
$result = $dbh->query($min_sql_query);

//----------------Inlägg samt form och knapp för att ändra och uppdatera inlägget

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        echo "<p>";
        echo "<h2>{$post['title']} | {$post['posted_date']}</h2>";
        echo "<h4>{$post['description']}</h4><br />";
        echo "<img src='{$post['picture']}'/><br />";
        echo "<a href=\"./index.php?page=handlePost&action=delete&id=" . $post['id'] . "\">Delete</a><br />";
        echo "<a href=\"./index.php?page=editPost&action=edit&id=" . $post['id'] . "\">Redigera</a>";
        echo "</p>";
    }

    include("classes/Comments.php");
    include("includes_partials/database_connection.php");
    $Comments = new Comments($dbh);

    $Comments->fetchAll();

    $min_sql_query = "SELECT id, content, user_id, post_id FROM comments WHERE post_id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $comments) {
        echo "<p>";
        echo "<h3>Kommentar: {$comments['content']} </h3><br />";
        echo "<h4>Kommenterat av: {$comments['user_id']} </h4>";
        echo "<a href=\"./index.php?page=handleComment&action=delete&id=" . $comments['id'] . "\">Delete</a><br />";
        echo "</p>";
        echo "<hr />";
    }
    
?>