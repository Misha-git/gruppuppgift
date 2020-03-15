<?php 

include("includes_partials/database_connection.php");
include("classes/Posts.php");


    //---------------------Hämtar inlägg via id från class----------------

    $id     = (isset($_GET['id']) ? $_GET['id'] : -1);

    echo "<h2>Kommentera inlägget #$id!</h2>";

    $Posts = new GBPost($dbh);

    $Posts->fetchAll();

    $min_sql_query = "SELECT id, title, description, posted_date FROM posts WHERE id={$_GET['id']}";
    $result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        if(isset($_GET['action']) && $_GET['action'] == "comment") {
            echo "<p>";
            echo "<h2>{$post['title']} | {$post['posted_date']}</h2>";
            echo "<h3>". utf8_encode($post['description']) ."</h3>";
            echo "</p>";
            }

            if (!$result) {
                print_r($dbh->errorInfo());
                die;
                }
        }

?> 

<!------------------------------Formulär för att göra en kommentar--------------->

        <form method="POST" action="handlers/handleComment.php">
            <h2>Inlägg: </h2><br />
            <textarea name="content" rows="5" cols="20"></textarea><br />
            <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>"/>
            <input type="submit" value="Skicka inlägg" />
        </form> 
