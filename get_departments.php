<?php
	require_once "config.php";

	$id = $_POST['id'];

	$query = "SELECT * FROM department WHERE uni_id ='$id'";

	// connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

    if(!($result = $conn->query($query))) die($conn->error);

    $final['result'] = "";

    for ($i=0; $i < $result->num_rows; $i++) {
    	$row = $result->fetch_assoc();

    	$final['result'].= '<div class="col-xs-3 card-container"">
          <div class="card">
          <div class="user-photo-container">
          <img src="img/university.png" class="card-img-top">
      </div>
            <div class="card-body">
              <p class="card-text">'.$row['name'].'</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getSemesters('.$row['id'].')">
            </div>
          </div>
        </div>';
    }

    $final['result'].= '<div class="col-xs-3 card-container"">
          <div class="card">
            <img class="card-img-top" src="img/chevron-left.svg" alt="">
			<div class="card-body" data-choice = '.$row['name'].'>
              <p class="card-text">Back<br/><br/></p>
            </div>
            <div class="card-footer">
              <a href="browse.php" class="btn btn-primary"></a>
            </div>
          </div>
        </div><br>';

    echo json_encode($final);

    mysqli_close($conn);
?>
