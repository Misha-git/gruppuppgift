<?php 

include("../includes_partials/database_connection.php");
include("../classes/Posts.php");

$action = (isset($_GET['action']) ? $_GET['action'] : '');
$id     = (isset($_GET['id']) ? $_GET['id'] : -1);

    if ($action == "delete") {

    $query = "DELETE FROM posts WHERE id=:id";
    $return = $dbh->exec($query);

    $sth = $dbh->prepare($query);
    $sth->bindParam(':id', $id);

    $return = $sth->execute();

    header("location:../index.php");
    } 

    echo "<h2>Kommentera inlägget #$id!</h2>";

    $query = "SELECT id, title, description FROM posts WHERE id=:id LIMIT 1";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':id', $id);
    $return = $sth->execute(); 

        if (!$return) {
        print_r($dbh->errorInfo());
        die;
        }

        $Posts = new GBPost($dbh);

        $Posts->fetchAll();

        $min_sql_query = "SELECT id, title, description, posted_date FROM posts WHERE id={$_GET['id']}";
        $result = $dbh->query($min_sql_query);


        foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {

            if(isset($_GET['action']) && $_GET['action'] == "comment") {
            echo "<p>";

            echo "<h1>{$post['title']} | {$post['posted_date']}</h1>";
            echo "<h3>". utf8_encode($post['description']) ."</h3>";
            echo "</p>";


}
        }
//-------Här slutar "visa inlägg"---------------




?> 

<!------Formulär för att göra en kommentar--------------->


<form method="POST" action="./handleComment.php">
        <h2>Titel: </h2><br />
        <input type="text" name="username">
        <h2>Inlägg: </h2><br />
        <textarea name="content" rows="5" cols="20"></textarea><br />
        <input type="submit" value="Skicka inlägg" />
</form> 
