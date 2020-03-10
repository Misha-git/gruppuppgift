<?php 
    include("../includes_partials/database_connection.php"); //inkluderar db-fil med våra variabler
    include("../classes/Posts.php");
?>

<center>
    <form method="GET" action="index.php">
        <input type="search" name="search_query" />
        <input type="submit" value="SÖK!" />
    </form>
</center>

<hr />

<?php


    //-------------------------Search-----------------------------

    if(isset($_GET['search_query'])) { //om search query e satt så kan vi söka
        $searchQuery = $_GET['search_query'];

        $order = "desc"; //variabel som gör den fallande
            if(isset($_GET['order']) && $_GET['order'] == "ascending") {
            $order = "asc";
            }
        $query = "SELECT id, title, description, posted_date FROM posts WHERE title LIKE '%:searchQuery%' OR description LIKE '%:searchQuery%' ORDER BY posted_date $order";

        $sth = $dbh->prepare($query);
        $queryParam = '%' . $searchQuery . '%';
        $sth->bindParam(':searchQuery', $searchQuery); //Binder parametrarna till varandra

        $return = $sth->execute();
        
                if(!$return) { //om den inte är true så 
                print_r($dbh->errorInfo());
                die;
                }

        echo "<h2>Sökresultat!</h2> Vi hittade" . $sth->rowCount() . " inlägg på sökordet $searchQuery!<hr />";
        echo '<center>Sortering: <a href="index.php?search_query=' . $searchQuery .  '&order=descending">Fallande</a> | <a href="index.php?search_query=' . $searchQuery . '&order=ascending">Stigande</a></center>';

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) //PDO är en "lista" med inbyggda funktioner, :: hämtar en funktion som i detta fall heter ASSOC
        { //rows innehåller alla rader i databasen. row skriver ut en rad
            echo "<strong>" . "Titel: " . "</strong>". $row['title'] . "<br />"; //strong gör att texten blir tjock, row är en länk till vår databas där den hittar kolumnen name
            echo "<strong>" . "Inlägg: " . "</strong>" . $row['description'] . "<br />";
            echo "<strong>" . "Datum: " . "</strong>" . $row['posted_date'] . "<br />";
            echo "<a href=\"./handlePost.php?action=delete&id=" . $row['id'] . "\">Delete</a>"; //länk till handlepost som tar bort Id som vi hänvisar till. Länken heter delete
            echo "<hr />";
        }
?>

<?php 
    } else {
?>

<center>Sortering: <a href="index.php?order=descending">Fallande</a> | <a href="index.php?order=ascending">Stigande</a></center>

<?php 

//--------------------Visa inlägg efter att ha tryckt på listan ----------------

$Posts = new GBPost($dbh);

$Posts->fetchAll();

$min_sql_query = "SELECT id, title, description, posted_date FROM posts WHERE id={$_GET['id']}";
$result = $dbh->query($min_sql_query);

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $post) {
        echo "<p>";

        echo "<h1>{$post['title']} | {$post['posted_date']}</h1>";
        echo "<h3>". utf8_encode($post['description']) ."</h3>";
        echo "<a href=\"./handlePost.php?action=delete&id=" . $post['id'] . "\">Delete</a><br />";
        echo "<a href=\"./editPost.php?action=edit&id=" . $post['id'] . "\">Redigera</a>";
        echo "</p>";
    }
    }
?>