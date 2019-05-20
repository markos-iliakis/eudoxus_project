<?php
    session_start();
    require_once "config.php";
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $user_id = $_SESSION['user_id'];
    $department = $_POST['department'];
    echo $department;

    $university = $_POST["university"];
    echo $university;
    $uni_id = -1;
    $departmnet_id = -1;

    $result3 = mysqli_query($link, "SELECT * FROM department WHERE name = 'Department of Informatics and Telecommunications' ");
    $uni_id = -1;
    $departmnet_id = -1;
    while($row2 = mysqli_fetch_array($result3)) {
        $uni_id = $row2[1];
        $departmnet_id = $row2[0];
    }

    $sql = "UPDATE students SET department_id=$departmnet_id WHERE user_id=$user_id";
    if ($link->query($sql) === TRUE) {
        header("Location:   http://localhost/eam_project/profile.php"); /* Redirect browser */
        exit();
    }
    else {
        echo "Error updating record: " . $link->error;
    }

    $link->close();
?>
