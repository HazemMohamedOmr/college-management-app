<?php
require_once('database.php');


Class Book{

    private $title;
    private $publishDate;
    private $author;
    private $category;
    private $quantity;

    public function listBooks(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `Title`, `Publish-date`, `author`, `category` FROM `book`';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $results;
    }

   
}
