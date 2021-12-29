<?php

// require('database.php');
require_once('database.php');

Class Book{

    private $title;
    private $publishDate;
    private $author;
    private $category;
    private $quantity;

    public function listbook(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT Title, `Publish-date`, author, category, quantity FROM book';
        $result = $mysqli->query($sql_query);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $books;
    }

    public function addBook($title,$author, $publishDate, $category, $quantity){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        session_start();
        $libid = $_SESSION['id'];
        
        $this->title = mysqli_real_escape_string($mysqli,$title);
        $this->publishDate = mysqli_real_escape_string($mysqli, $publishDate);
        $this->author = mysqli_real_escape_string($mysqli, $author);
        $this->category = mysqli_real_escape_string($mysqli, $category);
        $this->quantity = mysqli_real_escape_string($mysqli, $quantity);
     
        $sql_query= "INSERT INTO `book`(`Title`, `LibrarianID`, `Publish-date`, `author`,`category`, `quantity`) VALUES (' $this->title', '$libid', '$this->publishDate','$this->author','$this->category','$this->quantity')";
        echo $sql_query;
        if(mysqli_query($mysqli, $sql_query)){
            header('Location: ../views/librarian/Books.php');
            
        } else {
            echo 'query error: '. mysqli_error($mysqli);
        }
    }
}

?>