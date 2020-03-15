<?php 

    include("classes/Posts.php");
    include("classes/Comments.php");

    //--------------------Visa inlägg som user efter att ha tryckt på listan ----------------

    $Posts = new GBPost($dbh);

    $Posts->fetchAll();

    $min_sql_query = "SELECT id, title, description, posted_date, picture FROM posts WHERE id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        echo "<p>";
        echo "<h2>{$post['title']} | {$post['posted_date']}</h2>";
        echo "<h3>{$post['description']}</h3>";
        echo "<img src=\"{$post['picture']}\" alt=\"icon\" /><br />";
        echo "<a href=\"./index.php?page=makeComment&action=comment&id=" . $post['id'] . "\">Kommentera</a>";
        echo "</p>";
        echo "<hr />";
    }

    //--------------------------Hämtar alla kommentarer för inlägg---------------------------

    $Comments = new Comments($dbh);

    $Comments->fetchAll();

    $min_sql_query = "SELECT id, content, user_id, post_id FROM comments WHERE post_id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $comments) {
        echo "<p>";
        echo "<h3>Kommenterat av: {$comments['user_id']} </h3>";
        echo "<h4>Kommentar: {$comments['content']} </h4>";
        echo "</p>";
        echo "<hr />";
    }

?>