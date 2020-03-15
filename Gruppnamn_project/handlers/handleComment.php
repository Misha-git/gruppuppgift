
<?php 

    include("../includes_partials/database_connection.php"); 

    //---------------Om admin vill ta bort kommentar så skickas action hit
    if(isset($_GET['action']) && $_GET['action'] == "delete") { 

        $query = "DELETE FROM comments WHERE id=". $_GET['id'];
        
        $id = htmlspecialchars($id);
        $sth =  $dbh->prepare($query); 
        $sth->bindParam('id', $id);
        $return = $dbh->exec($query); 

        header("location:./index.php?page=allPosts");


    } else { 

    //--------------Felmeddelanden när user gör kommentar------------------------
        
    $content          = (!empty($_POST['content']) ? $_POST['content'] : ""); 
    $content          = htmlspecialchars($content);

    $errors = false;
    $errorMessages = "";
 

        if(empty($content)) { 
        $errorMessages .= "Du måste skriva en titel! <br />";
        $errors = true;
        }
        
    }
        if($errors == true) {
            echo $errorMessages;
            echo '<a href=index.php>Gå tillbaka</a>';
            die;
        }

    //---------------------Lägger in kommentarer i databasen------------------------

    session_start();
    $query = "INSERT INTO comments(content, post_id, user_id) VALUES('$content', '{$_POST['post_id']}', '{$_SESSION['user_id']}');";
    $return = $dbh->exec($query);

    if( !$return) {
    print_r($dbh->errorInfo());

    } else {
        header("location:../index.php?page=allPosts");
        }


?>

