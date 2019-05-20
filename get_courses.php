<?php
	require_once "config.php";

	$dep = $_POST['dep'];
  $sem = $_POST['sem'];

	$query = "SELECT * FROM courses WHERE department_id = '$dep' AND semester ='$sem'";
  $query2 = "SELECT title, ISBN FROM books WHERE ISBN IN (SELECT ISBN FROM course_books WHERE course_id ='$dep')";

	// connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

    if(!($result = $conn->query($query))) die($conn->error);

    $final['result'] = "";

    for ($i=0; $i < $result->num_rows; $i++) {
      $row = $result->fetch_assoc();

    	$final['result'].= '<div  class="col-xs-3 card-container">
          <div class="card">
            <div class="card-body">
              <p class="card-text"><br/><br/><br/><br/> '.$row['title'].'<br/><br/></p>';

      // if(!($result2 = $conn->query($query2))) die($conn->error);
      // for ($j=0; $j < $result2->num_rows; $j++) {
      //   $row2 = $result2->fetch_assoc();

      //   $final['result'].= '<input type="checkbox" name="book'.$j.'" value="'.$row2['ISBN'].'">'.$row2['title'].'<br>';
      // }

      $final['result'].= '
      <br></form>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getBooks('.$row['id'].', '.$dep.', '.$sem.')">
            </div>
          </div>
        </div>';
    }

    $final['result'].= '<div  class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="img/chevron-left.svg" alt="">
			<div class="card-body">
              <p class="card-text">Back</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getSemesters('.$dep.')">
            </div>
          </div>
        </div><br>';

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
