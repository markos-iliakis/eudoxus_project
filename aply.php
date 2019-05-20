<?php
    session_start();
    require_once "config.php";

    if (!isset($_SESSION['user_id'])){
        header("Location: login.html"); /* Redirect browser */
        exit();
    }

    // connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);


    $isbn = $_SESSION["isbn"];
    $user_id = $_SESSION["user_id"];
    $semester = $_SESSION["sem"][0];
    $exists = false;

    // check if user has already purchased this book (must be done at what it is shown to user)
    // $query = "SELECT id FROM applications WHERE user_id=$user_id";
    // if(!($result = $conn->query($query))) die($conn->error);
    // if($result->num_rows > 0){
    //     $row = $result->fetch_assoc();
    //     $id = $row['id'];
    //     $query = "SELECT ISBN FROM app_books WHERE app_id=$id";
    //     if(!($result = $conn->query($query))) die($conn->error);
    //     foreach ($result->fetch_assoc()['ISBN'] as $isb) {
    //         if($isb == $isbn) $exists = true;
    //     }
    // }
    foreach ($isbn as $is) {
        echo "$is\n";
    }
    
    echo "$user_id\n";
    echo "$semester\n";

    // insert application
    $query = "INSERT INTO applications(user_id, semester) VALUES($user_id, $semester)";
    if(!($result = $conn->query($query))) die($conn->error);
    
    // get the id of the inserted application
    $query = "SELECT id FROM applications WHERE user_id=$user_id and semester=$semester";
    if(!($result = $conn->query($query))) die($conn->error);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    // insert the new application-books connection
    foreach ($isbn as $is) {
        $query = "INSERT INTO app_books(app_id, ISBN) VALUES($id, $is)";
        if(!($result = $conn->query($query))) die($conn->error);
    }
    unset($_SESSION['isbn']);
    unset($_SESSION['sem']);
?>
