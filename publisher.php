<?php

session_start();
require_once "config.php";

if (isset($_SESSION['user_id']) == 0){
    header("Location: login.html"); /* Redirect browser */
    exit();
}

$query2 = "SELECT name , until_date FROM universities";

// connect to db
if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);


$book_name = $_POST['book_name'];
$isbn = $_POST["isbn"];
$publisher = $_POST["publisher"];

$authors = $_POST["author"];
$courses = $_POST["course"];
$dist_points = $_POST["dist_point"];

// echo "$book_name";
// echo "$isbn";
// echo "$publisher";

// foreach ($authors as $auth) {
//     echo "$auth";
// }
// foreach ($courses as $cor) {
//     echo "$cor";
// }
// foreach ($dist_points as $dp) {
//     echo "$dp";
// }

// check if isbn already exists and insert book
$query = "SELECT ISBN FROM books WHERE ISBN=$isbn";
if(!($result = $conn->query($query))) die($conn->error);
if($result->num_rows == 0){

    $query = "INSERT INTO books (ISBN, title) VALUES ($isbn, '".$book_name."')";
    if(!($result = $conn->query($query))) die($conn->error);
    echo "book inserted\n";
    // check if publisher exists and insert him
    $query = "SELECT id FROM publisher WHERE name='".$publisher."'";
    if(!($result = $conn->query($query))) die($conn->error);
    if($result->num_rows == 0){
        $query = "INSERT INTO publisher (name) VALUES ('".$publisher."')";
        if(!($result = $conn->query($query))) die($conn->error);
        echo "publisher inserted\n";
    }

    // connect publisher and book
    $query = "SELECT id FROM publisher WHERE name='".$publisher."'";
    if(!($result = $conn->query($query))) die($conn->error);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $query = "INSERT INTO has_published (pub_id, ISBN) VALUES ($id, $isbn)";
    if(!($result = $conn->query($query))) die($conn->error);
    echo "has_published inserted\n";
    foreach ($courses as $cor) {
        // check if course exists
        $query1 = "SELECT id FROM courses WHERE title='".$cor."'";
        if(!($result = $conn->query($query1))) die($conn->error);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $id = $row['id'];
            // connect course and book
            $query2 = "INSERT INTO course_books (course_id, ISBN) VALUES ($id, $isbn)";
            if(!($result = $conn->query($query2))) die($conn->error);
            echo "course_books inserted\n";
        }
    }

    foreach ($authors as $auth) {
        // check if author exists and insert him
        $query = "SELECT id FROM authors WHERE first_name='".$auth."'";
        if(!($result = $conn->query($query))) die($conn->error);

        if($result->num_rows == 0){
            $query = "INSERT INTO authors (first_name, last_name) VALUES ('".$auth."', NULL)";
            if(!($result = $conn->query($query))) die($conn->error);
            echo "author inserted\n";
        }

        // connect author with book
        $query1 = "SELECT id FROM authors WHERE first_name='".$auth."'";
        if(!($result = $conn->query($query1))) die($conn->error);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $query2 = "INSERT INTO has_written (author_id, ISBN) VALUES ($id, $isbn)";
        if(!($result = $conn->query($query2))) die($conn->error);
        echo "has_written inserted\n";
    }

    // insert distribution points
    foreach ($dist_points as $dp) {
        $query = "INSERT INTO distribution (ISBN, address, availability) VALUES ($isbn, '".$dp."', 100)";
        if(!($result = $conn->query($query))) die($conn->error);
        echo "distribution inserted\n";
    }
}


?>
