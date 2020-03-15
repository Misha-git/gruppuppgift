<?php

//include("../db/db.php");

class Comments {
    private $databaseHandler;
    private $comments;

    public function __construct($dbh) {

        $this->databaseHandler = $dbh;

    }

    public function fetchAll() { //hämtar alla posts
        $query = "SELECT id, content, posted_date, user_id, post_id FROM comments"; //hämtar från databasen
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->comments = $return_array;
    }

    public function getComments() {
        return $this->comments;
    }

}


?>