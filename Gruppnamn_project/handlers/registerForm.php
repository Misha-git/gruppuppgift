<?php 

    include("../includes_partials/database_connection.php");

   //----------------Om fälten är ifyllda, men de ska tas bort (t.ex. vid error)-------
   
    if(isset($_POST['action']) && $_POST['action'] == "delete") { 

        $query = "DELETE FROM users WHERE id=" .$_POST ['id']; 
        
        $id = htmlspecialchars($id);
         
        $sth =  $dbh->prepare($query); 
        $sth->bindParam('id', $id);

        $return = $dbh->exec($query); 

        header("location:../index.php");

    } else { 


    //------------------------Ifyllda fält kontrolleras mot databasen----------------

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email    = $_POST['email'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $sth = $dbh->prepare($query);
    $return = $sth->execute();



    //------------------Om ifyllda fält matchar med databasens existerande data-----------

            if($sth->rowCount() >= 1) {
            echo "Användarnamnet eller e-mailen upptaget, vänligen försök med annat.";
            die;

            }else{
    
            $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email');";
            $return = $dbh->exec($query);

            $username = (empty($_POST['username']) ? $_POST['username'] : ""); 
            $password = (empty($_POST['password']) ? $_POST['password'] : ""); 

            $username = htmlspecialchars($username);
            $password = htmlspecialchars($password);

            header("location:../views/loginForm.php");

      //----------------------------------Om fälten INTE fylls i-----------------------

        $errors = false; 
        $errorMessages = "";
                
        if(empty($username)) { 
        $errorMessages .= "Du måste skriva ett användarnamn! <br />";
        $errors = true;
        }
            if(empty($password)) {
        $errorMessages .= "Du måste skriva ett namn! <br />";
        $errors = true;
        }
            if($errors == true) {
            echo $errorMessages;
            header("location:../views/signUpForm.php");

            die;
        }
            }
        }

?>