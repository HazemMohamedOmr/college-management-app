<?php

require('result_db.php');
require('TimeTable_db.php');
require('Event_db.php');
require('mybooks_db.php');
require('fee_db.php');
require('mypay_db.php');
require('attendance_db.php');

class student{
    public function viewResults(){
        $result = new result();
        $results = $result->listresult();
        return $results;
    }

    public function viewTimeTable(){
        $TimeTable = new TimeTable();
        $Tables = $TimeTable->listTimeTable();
        return $Tables;
    }

    public function viewEvent(){
        $Event = new Event();
        $Events = $Event->listEvent();
        return $Events;
    }

    public function viewBooks(){
        $book = new book();
        $books = $book->listBooks();
        return $books;
    }
    
    public function viewFees(){
        $fee = new Fee();
        $fees = $fee->listFees();
        return $fees;
    }

    public function viewPays(){
        $pay = new mypay();
        $pays = $pay->listMyPays();
        return $pays;
    }

    public function viewAttendance(){
        $attend = new Attendance();
        $attendance = $attend->listAttendance();
        return $attendance;
    }
}

?>