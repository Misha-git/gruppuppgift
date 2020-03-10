$title = "PHPsidan";
include("header.php");

$page = (isset($_GET['page']) ? $_GET['page'] : '');

if($page == "about") {
    include("views/about.php");
} else if ($page == "login") {
    include ("views/login.php");
} else {
    include("viws/homepage.php");
}