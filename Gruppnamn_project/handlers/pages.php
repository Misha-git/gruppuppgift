<?php 
    $title = "PHPsidan";
    
    $page = (isset($_GET['page']) ? $_GET['page'] : '');

    if($page == "blogg") {
        include("views/blogg.php");
        } else if($page == "registerForm") {
        include("handlers/registerForm.php");
        } else if($page == "allPosts") {
        include("handlers/allPosts.php");
        } else if($page == "logout") {
            include("handlers/logout.php");
    }

?>