<?php 

    include("includes_partials/database_connection.php");

    //----------------Om admin vill ta bort inlägg skickas action hit

    if(isset($_GET['action']) && $_GET['action'] == "delete") { 

        $query = "DELETE FROM comments WHERE post_id=". $_GET['id']; 
        $return = $dbh->exec($query);
        $query = "DELETE FROM posts WHERE id=". $_GET['id']; 
        $return = $dbh->exec($query); 

        header("location:./index.php?page=allPosts"); 
        }

            if(isset($_GET['action']) && $_GET['action'] == "edit") {
                $query ="UPDATE posts SET title=:title, description=:description WHERE id=:id";
        
                $sth =  $dbh->prepare($query); //statement handler
                $sth->bindParam(':title', $_POST['title']); //BindParam sätter :name till variabel. PDO-funktion.
                $sth->bindParam(':description', $_POST['description']);
                $sth->bindParam(':id', $_GET['id']);
        
                $return = $sth->execute();
    
                header("location:./index.php?page=allPosts");
   
        } else { 
        
        $title          = (!empty($_POST['title']) ? $_POST['title'] : ""); 
        $description    = (!empty($_POST['description']) ? $_POST['description'] : ""); 
        $category       = (!empty($_POST['category']) ? $_POST['category'] : "");
        $picture        = (!empty($_POST['picture']) ? $_POST['picture'] : "");


        $title          = htmlspecialchars($title);
        $description    = htmlspecialchars($description);
        $category       = htmlspecialchars($category);
        $picture        = htmlspecialchars($picture);

    //----------Felmeddelanden när user gör inlägg------------------------

    $errors = false; 
    $errorMessages = "";

        if(empty($title)) { 
        $errorMessages .= "Du måste skriva en titel! <br />";
        $errors = true;
        }

    
        if(empty($description)) {
        $errorMessages .= "Du måste skriva ett inlägg! <br />";
        $errors = true;
        
    }
        if($errors == true) {
            echo $errorMessages;
            echo '<a href=index.php>Gå tillbaka</a>';
            die;
        }


    //---------------------Lägger in inlägg i databasen------------------------

    $query = "INSERT INTO posts(title, description, category, picture) VALUES('$title', '$description', '$category', '$picture');"; //tar värdena från tabellen. Kolon gör att den förstår att det är variabeler.
    
    $sth =  $dbh->prepare($query); 
 
    $return = $dbh->exec($query);

    if( !$return) {
    print_r($dbh->errorInfo());

    } else {
        header("location:index.php?page=allPosts");
        }
    }

?> 
