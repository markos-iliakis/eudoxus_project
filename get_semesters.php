<?php
	require_once "config.php";

	$id = $_POST['id'];

	$query = "SELECT sem_num, id FROM department WHERE id ='$id'";

	// connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

    if(!($result = $conn->query($query))) die($conn->error);

    $final['result'] = "";

    $row = $result->fetch_assoc();

    for ($i=0; $i < $row['sem_num']; $i++) {
    	$i++;

    	$final['result'].= '<div class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="img/todo.png" alt="">
            <div class="card-body">
              <p class="card-text">'.$i.'ο Εξάμηνο</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getCourses('.$row['id'].', '.$i.')">
            </div>
          </div>
        </div>';

        $i--;
    }

    $final['result'].= '<div  class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="img/chevron-left.svg" alt="">
			<div class="card-body">
              <p class="card-text">Back</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getDepartments('.$row['id'].')">
            </div>
          </div>
        </div>';

    $final['result'].= '<div  class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="img/chevron-left.svg" alt="">
      <div class="card-body">
              <p class="card-text">Ολοκλήρωση Δήλωσης</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="aply()">
            </div>
          </div>
        </div>';

    echo json_encode($final);

    mysqli_close($conn);
?>
