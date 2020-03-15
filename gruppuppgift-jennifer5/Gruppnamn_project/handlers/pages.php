<?php 
    $title = "PHPsidan";
    
    $page = (isset($_GET['page']) ? $_GET['page'] : '');

    //------------Views------------>
    if($page == "blogg") {
        include("views/blogg.php");


    //------------Handlers--------->
        } else if($page == "registerForm") {
        include("handlers/registerForm.php");

        } else if($page == "allPosts") {
        include("handlers/allPosts.php");

        } else if($page == "postUser") {
        include("handlers/postUser.php");

        } else if($page == "logout") {
            include("handlers/logout.php");
        
        } else if($page == "editPost") {
            include("handlers/editPost.php");

        } else if($page == "post") {
            include("handlers/post.php");

        } else if($page == "handlePost") {
            include("handlers/handlePost.php");

        } else if($page == "handleComment") {
            include("handlers/handleComment.php");

        } else if($page == "makeComment") {
            include("handlers/makeComment.php");
    }

?>