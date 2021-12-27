<?php

require('database.php');

Class Book{

    private $title;
    private $publishDate;
    private $author;
    private $category;
    private $quanitiy;

    public function listbook(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT Title, publishDate, author, category, quantity FROM book';
        $result = $mysqli->query($sql_query);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function addBook(){
        
    }
}

?>