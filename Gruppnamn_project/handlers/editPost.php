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


echo "<form method=\"POST\" action=\"post.php?action=edit&id=" . $data['id'] ."\">"; 
echo "<input type='text' name='title' value='". $data['title'] ."' /><br />"; 
echo "<input type='text' name='description' value='". $data['description'] ."' /><br />"; 
echo "<input type=\"submit\" name=\"Uppdatera\" />";
 

$sql ="UPDATE posts SET title=". $data['title'] . " WHERE id=:id";
$sql ="UPDATE posts SET description=". $data['description'] . " WHERE id=:id";



?> 
<?php 
/*
        <form method='POST' action="handlers/handlePost.php">
        <input type='text' name='title' value=<?php $data['title']?>><br />
        <input type='text' name='description' value='<?php $data['description']?>'> </br />
        <a href="/post.php?action=edit&id=" <?php $data['id'] ?>>Redigera 2</a>
    
/*
        $sql ="UPDATE posts SET title='$data['title']' WHERE id=:id";

            if ($dbh->query($sql) == true) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $dbh->error;
            }

            $dbh->close(); */

?>