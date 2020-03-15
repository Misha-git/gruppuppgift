<?php

//include("../db/db.php");

class GBPost {
    private $databaseHandler;
    private $order = "desc";
    private $posts;

    public function __construct($dbh) {

        $this->databaseHandler = $dbh;

    }

    public function fetchAll() { //hämtar alla posts
        $query = "SELECT id, title, description, posted_date, category, picture FROM posts ORDER BY posted_date $this->order"; //hämtar från databasen
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->posts = $return_array;
    }

    public function getPosts() {
        return $this->posts;
    }
}


?>