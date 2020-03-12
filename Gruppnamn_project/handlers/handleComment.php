<?php 

    include("../includes_partials/database_connection.php"); //inkludera databasfil
    if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

        $query = "DELETE FROM comments WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 
        
        $id = htmlspecialchars($id);
         
        $sth =  $dbh->prepare($query); //statement handler
        $sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

        $return = $dbh->exec($query); //exec returnerar false

        header("location:../index.php?page=allPosts");  //de ska skickas tillbaka till gästboken 

    } else { // om det inte finns action (om if är falskt)



    //----------Felmeddelanden när du gör inlägg------------------------
        
    $content          = (!empty($_POST['content']) ? $_POST['content'] : ""); // om tom = tom string
    //$description    = (!empty($_POST['description']) ? $_POST['description'] : ""); //empty kollar "är den här satt och har den något värde?"

    $content          = htmlspecialchars($content);
    //$description    = htmlspecialchars($description);

    $errors = false; //bool
    $errorMessages = "";

 

        if(empty($content)) { //Om den är tom: 
        $errorMessages .= "Du måste skriva en titel! <br />";
        $errors = true;
        }

    
        /*if(empty($description)) {
        $errorMessages .= "Du måste skriva ett inlägg! <br />";
        $errors = true;
        
    }*/
        if($errors == true) {
            echo $errorMessages;
            echo '<a href=index.php>Gå tillbaka</a>';
            die;
        }


    //---------------------Lägger in inlägg i databasen------------------------

    $query = "INSERT INTO comments(content) VALUES(:content);"; //tar värdena från tabellen. Kolon gör att den förstår att det är variabeler.
    
    $sth =  $dbh->prepare($query); //statement handler
    $sth->bindParam(':content', $content); //BindParam sätter :name till variabel. PDO-funktion.
    //$sth->bindParam(':description', $description);
    
    $return = $sth->execute();

    if( !$return) {
    print_r($dbh->errorInfo());

    } else {
        header("location:../index.php?page=allPosts");
        }
    }
?> 

