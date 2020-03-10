<?php 

include("../includes_partials/database_connection.php");

$action = (isset($_GET['action']) ? $_GET['action'] : '');
$id     = (isset($_GET['id']) ? $_GET['id'] : -1);

    if ($action == "delete") {

    $query = "DELETE FROM posts WHERE id=:id";
    $return = $dbh->exec($query);

    $sth = $dbh->prepare($query);
    $sth->bindParam(':id', $id);

    $return = $sth->execute();

    header("location:../index.php");
        } 

    else if ($action == "edit") {
        $sql ="UPDATE posts SET title='$data['title']' WHERE id=:id";


echo "<h2>Editera inlägg #$id!</h2>";

$query = "SELECT id, title, description FROM posts WHERE id=:id LIMIT 1";
$sth = $dbh->prepare($query);
$sth->bindParam(':id', $id);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
    die;
}

$data = $sth->fetch();

//här ska vi ändra, skapa väg till action

echo "<form method="POST" action="index.php?action=edit">"
echo "<input type='text' name='title' value='". $data['title'] ."' /><br />";
echo "<input type='text' name='description' value='". $data['description'] ."' /><br />";
echo "<input<a href=\"./post.php?action=edit&id=" . $data['id'] . "\">Redigera 2</a>";
}

$sql ="UPDATE posts SET title='$data['title']' WHERE id=:id";
?>