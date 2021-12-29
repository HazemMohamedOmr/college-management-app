<?php
    session_start();
    if(!isset($_SESSION['role'])){
        header("Location: views/sign-in.php");
    }elseif($_SESSION['role'] = 'admin'){
        header("Location: views/admin/home.php");
    }elseif($_SESSION['role'] = 'superadmin'){
        header("Location: views/superadmin/home.php");
    }elseif($_SESSION['role'] = 'student'){
        header("Location: views/student/home.php");
    }elseif($_SESSION['role'] = 'teacher'){
        header("Location: views/teacher/home.php");
    }elseif($_SESSION['role'] = 'librarian'){
        header("Location: views/librarian/home.php");
    }
?>

<a href="views/admin/home.php">admin</a>
<a href="views/superadmin/home.php">superadmin</a>
<a href="views/teacher/home.php">teacher</a>
<a href="views/student/home.php">student</a>
<a href="views/librarian/home.php">librarian</a>
