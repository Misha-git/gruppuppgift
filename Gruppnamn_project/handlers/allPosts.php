<?php 

include("../includes_partials/database_connection.php");
include("./pages.php");



$min_sql_query = "SELECT id, title, description, posted_date FROM posts";
    $result = $dbh->query($min_sql_query);
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        echo "<p>";

        echo "<h1><a href='handlers/post.php?id={$post['id']}'>{$post['title']} | {$post['description']} | {$post['posted_date']}</a></h1>";

        echo "</p><hr />";
}


?>