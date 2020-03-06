<?php 

include("../includes_partials/database_connection.php"); //inkludera databasfil

$min_sql_query = "SELECT id, title, description, posted_date FROM posts WHERE id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        echo "<p>";

        echo "<h1>{$post['title']} | {$post['posted_date']}</h1>";
        echo "<h3>". utf8_encode($post['description']) ."</h3>";


        echo "</p>";
    }

    $min_sql_query = "SELECT id, user_id, description, posted_date FROM posts WHERE id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    if($result != false) {

        foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
            echo "<pre>";
            print_r($post);

            echo "</pre>";
        }

    } else {
        echo "error!";
    }

    session_start();
    $_SESSION['username'] = "admin";
    $_SESSION['role'] = "admin";

?>
