<?php
    session_start();
        if(!isset($_SESSION['isbn'])) $_SESSION['isbn'] = array();
        array_push($_SESSION['isbn'], $_POST["isbn"]);
        echo $_POST['isbn'];
        if(!isset($_SESSION['sem'])) $_SESSION['sem'] = [];
        $_SESSION['sem'][]= $_POST["sem"];
        echo $_SESSION['sem'][0];
    
?>