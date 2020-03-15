<?php

include("../includes_partials/database_connection.php");

//-----------------------------Lägger upp bild i visual------------------------

if(isset($_POST['submit'])) {
    $file = $_FILES['picture']; 
    
    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');


    if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt; 
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $description = (!empty($_POST['description']) ? $_POST['description'] : "");
                $title       = (!empty($_POST['title']) ? $_POST['title'] : "");
                $category    = (!empty($_POST['category']) ? $_POST['category'] : ""); 


                $description = filter_var($description, FILTER_SANITIZE_STRING);
                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $category = filter_var($category, FILTER_SANITIZE_STRING);

    //-----------------------------Lägger in filerna i databasen----------------


                $query = "INSERT INTO posts (title, description, picture, category) values ('$title', '$description', '$fileDestination', '$category');";
                $return = $dbh ->exec($query);

                header("location:../index.php?page=allPosts");
            } else {
                echo "Filen är för stor!";
            }
        } else {
            echo "Något gick fel vid uppladdningen!";
        }
    } else {
        echo "Du kan inte ladda upp den här filtypen";
    }
}

?>