<?php 

include("includes_partials/database_connection.php");


//-----------------GET hittar ID på inlägg och hämtar från databasen

$id     = (isset($_GET['id']) ? $_GET['id'] : -1);

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


//--------------------Form och panel------------------

echo "<form method=\"POST\" action=\"./index.php?page=handlePost&action=edit&id=" . $data['id'] ."\">"; 
echo "<input type='text' name='title' value='". $data['title'] ."' /><br />"; 
echo "<input type='textarea' name='description' value='". $data['description'] ."' /><br />";
echo "<input type=\"submit\" name=\"Uppdatera\" />";
 

//--------------------Databasen uppdateras med ny data
$sql ="UPDATE posts SET title=". $data['title'] . " WHERE id=:id";
$sql ="UPDATE posts SET description=". $data['description'] . " WHERE id=:id";

?> 
