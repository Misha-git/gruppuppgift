<?php 

    include("../includes_partials/database_connection.php");



    
   //-----------Om fälten är ifyllda, men de ska tas bort (t.ex. vid error)-------
   
    if(isset($_POST['action']) && $_POST['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

        $query = "DELETE FROM users WHERE id=" .$_POST ['id']; //query returnerar en array med värdet från databasen 
        
        $id = htmlspecialchars($id);
         
        $sth =  $dbh->prepare($query); //statement handler
        $sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

        $return = $dbh->exec($query); //exec returnerar false

        header("location:../index.php");

    } else { // om det inte finns action (om if är falskt)



    //-----------Ifyllda fält kontrolleras mot databasen----------------

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email    = $_POST['email'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $sth = $dbh->prepare($query);
    $return = $sth->execute();

    include("../views/signUpForm.php");
    }



    //------------Om ifyllda fält matchar med databasens existerande data-----------

            if($sth->rowCount() >= 1) {
            echo "Användarnamnet eller e-mailen upptaget, vänligen försök med annat.";
            die;

            }else{
    
            $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email');"; //tar värdena från tabellen
            $return = $dbh->exec($query);

            $username = (!empty($_POST['username']) ? $_POST['username'] : ""); // om tom = tom string
            $password = (!empty($_POST['password']) ? $_POST['password'] : ""); //empty kollar "är den här satt och har den något värde?"

            $username = htmlspecialchars($username);
            $password = htmlspecialchars($password);

            $errors = false; 
            $errorMessages = "";

            header("location:../views/loginForm.php");



      //-----------Om fälten INTE fylls i-----------------------

        if(empty($username)) { //Om den är tom: 
        $errorMessages .= "Du måste skriva ett användarnamn! <br />";
        $errors = true;
        }
            if (empty($password)) {
        $errorMessages .= "Du måste skriva ett namn! <br />";
        $errors = true;
        }
            if($errors == true) {
            echo $errorMessages;
            header("location:../views/signUpForm.php");

            die;
        }
    }

?>