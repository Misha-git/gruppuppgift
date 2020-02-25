<?php 

    include("../includes_partials/database_connection.php");

    if(isset($_POST['action']) && $_POST['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

        $query = "DELETE FROM users WHERE id=". $_POST['id']; //query returnerar en array med värdet från databasen 
        
        $id = htmlspecialchars($id);
         
        $sth =  $dbh->prepare($query); //statement handler
        $sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

        $return = $dbh->exec($query); //exec returnerar false

        header("location:../index.php"); //de ska skickas tillbaka till gästboken 

    } else { // om det inte finns action (om if är falskt)

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];


        //------
    $usernamecheck = mysql_query("SELECT 'username' FROM users WHERE username='$username'");
            if(mysql_num_rows($usernamecheck)>=0){
        echo $username." is already taken";
            }else{
        echo $username."is available";
        }
        //-------

    $query = $pdo->query('SELECT id FROM users WHERE username = ?');
    $query->execute([$username]);

    $row = $query->fetch();

    if (false !== $row) {
    // user exists
    }

        //-------


    $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email');"; //tar värdena från tabellen
    $return = $dbh->exec($query);

    $username    = (!empty($_POST['username']) ? $_POST['username'] : ""); // om tom = tom string
    $password    = (!empty($_POST['password']) ? $_POST['password'] : ""); //empty kollar "är den här satt och har den något värde?"

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

        $errors = false; //bool
        $errorMessages = "";
 

        if( empty($username)) { //Om den är tom: 
        $errorMessages .= "Du måste skriva ett användarnamn! <br />";
        
        $errors = true;
        
        }

        if ( empty($password)) {
        $errorMessages .= "Du måste skriva ett namn! <br />";
        
        $errors = true;
        
    }

        if($errors == true) {
            echo $errorMessages;
            echo '<a href=index.php>Gå tillbaka</a>';
            
            
            die;
        }
    
    }
?>