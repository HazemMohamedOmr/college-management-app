<?php

require('book_db.php');

    class Admin{

        public function viewBook(){
            $book = new Book();
            $books = $book->listbook();
            return $books;
        }
    }

?>