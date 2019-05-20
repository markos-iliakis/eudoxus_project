<?php

require_once 'config.php';

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email = $_POST["email"];
$password = $_POST["psw"];
$user_type= $_POST["user-type"];


$result1 = mysqli_query($link, "SELECT *from users WHERE email = '$email'");

if(mysqli_num_rows($result1) > 0){
    echo "This email already exists. Please try with another email";
    header("Location:   http://localhost/eam_project/index.php"); /* Redirect browser */
    mysqli_close($link);
    exit;
}
else{

    if(strcmp($user_type, "student") == 0){

        $university = $_POST["university"];
        $departmnet = $_POST["department"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        $sql1 = "INSERT INTO users (type, password, email)
        VALUES (0, '$password', '$email')";
        if (mysqli_query($link, $sql1)) {


            $result2 = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' and password = '$password' ");
            $user_id = -1;
            while($row = mysqli_fetch_array($result2)) {
                $user_id = $row[0];
            }

            if(strcmp($departmnet, "dit") == 0){

                $departmnet = "Department of Informatics and Telecommunications";

                $result3 = mysqli_query($link, "SELECT * FROM department WHERE name = '$departmnet' ");
                $uni_id = -1;
                $departmnet_id = -1;
                while($row2 = mysqli_fetch_array($result3)) {
                    $uni_id = $row2[1];
                    $departmnet_id = $row2[0];
                }
                  $sql2 = "INSERT INTO students (user_id, department_id, first_name, last_name)
                  VALUES ($user_id, $departmnet_id, '$firstname', '$lastname')";
                  mysqli_query($link, $sql2);
            }
            elseif (strcmp($departmnet, "math") == 0) {
                $departmnet = "Department of Mathematics";

                $result3 = mysqli_query($link, "SELECT * FROM department WHERE name = '$departmnet' ");
                $uni_id = -1;
                $departmnet_id = -1;
                while($row2 = mysqli_fetch_array($result3)) {
                    $uni_id = $row2[1];
                    $departmnet_id = $row2[0];
                }
                  $sql2 = "INSERT INTO students (user_id, department_id, first_name, last_name)
                  VALUES ($user_id, $departmnet_id, '$firstname', '$lastname')";

                  mysqli_query($link, $sql2);
            }
            elseif(strcmp($departmnet, "hmmy") == 0) {
                $departmnet = "School of Electrical and Computer Engineering";

                $result3 = mysqli_query($link, "SELECT * FROM department WHERE name = '$departmnet' ");
                $uni_id = -1;
                $departmnet_id = -1;
                while($row2 = mysqli_fetch_array($result3)) {
                    $uni_id = $row2[1];
                    $departmnet_id = $row2[0];
                }
                  $sql2 = "INSERT INTO students (user_id, department_id, first_name, last_name)
                  VALUES ($user_id, $departmnet_id, '$firstname', '$lastname')";
                  mysqli_query($link, $sql2);
            }

            header("Location:   http://localhost/eam_project/index.php"); /* Redirect browser */
            exit();
        }
        else {
            echo "Αποτυχία εγγραφής";
        }
    }
    elseif (strcmp($user_type, "publisher") == 0) {
        $sql = "INSERT INTO users (type, password, email)
        VALUES (1, $password, $email)";
    }

}



mysqli_close($link);

?>
