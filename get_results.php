<?php
	require_once "config.php";

	$option = $_GET['option'];
	$q = $_GET['q'];

	echo '
        <!DOCTYPE html>
        <html lang="utf-8">

        <head>
            <meta charset="utf-8">

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/test.css">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <link rel="stylesheet" type="text/css" href="css/browse.css">
        </head>
        <body style="background-color:#ededed">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                            Αρχική Σελίδα
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Φοιτητές
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="info.php">Πληροφορίες</a>
                                <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Εκδότες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Πληροφορίες</a>
                                <a class="dropdown-item" href="publisher.html">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Γραμματείες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Πληροφορίες</a>
                                <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Διαθέτες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Πληροφορίες</a>
                                <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Διανομείς
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Πληροφορίες</a>
                                <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Βιβλιοθήκες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Πληροφορίες</a>
                                <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="profile.php" role="button" aria-haspopup="true" aria-expanded="false">
                            Προφίλ</a>
                        </li>
                        <li  class="nav-item">
                            <button id="searchButton" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Αναζήτηση</button>
                            <script type="text/javascript">
                                document.getElementById("searchButton").onclick = function () {
                                location.href = "search.php";
                                };
                            </script>
                        </li>
                    </ul>

            </nav>';


	$query = "";

	if ($option == "b") {
		$query = "SELECT * FROM books WHERE title LIKE '%$q%'";
	} elseif ($option == "d") {
		$query = "SELECT * FROM distribution WHERE address LIKE '%$q%'";
	} elseif ($option == "p") {
		$query = "SELECT * FROM publisher WHERE name LIKE '%$q%'";
	}

	if ($query != "") {
		// connect to db
		if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

		if(!($result = $conn->query($query))) die($conn->error);

		$num_rows = $result->num_rows;
		echo 'Results found: '.$num_rows.'<br/>';

		for ($i=0; $i < $num_rows ; $i++) { 
			$row = $result->fetch_assoc();

			if ($option == "b") {

				$isbn = $row['ISBN'];
				$query2 = "SELECT first_name, last_name FROM authors WHERE id IN 
								(SELECT author_id FROM has_written WHERE ISBN ='$isbn')";
				if(!($result2 = $conn->query($query2))) die($conn->error);
				$row2 = $result2->fetch_assoc();

				echo '<div class="col-xs-3 card-container">
			          <div class="card">
			            <img class="card-img-top" src="'.$row['image'].'" alt="">
			            <div class="card-body">
			              <p class="card-text">'.$row['title'].'</p><br />
			              <p>Author: '.$row2['first_name'].' '.$row2['last_name']. '</p><br />
					  	  <p>ISBN: ' .$isbn. '</p><br />
			            </div>
			          </div>
			        </div>';
			}
			elseif ($option == "d") {
				echo '<h3>' . $row['address'] . '</h3><br />';

				$isbn = $row['ISBN'];

				$query2 = "SELECT title FROM books WHERE ISBN='$isbn'";
				if(!($result2 = $conn->query($query2))) die($conn->error);
				$num_rows2 = $result2->num_rows;
				for ($j=1; $j <= $num_rows2 ; $j++) {	
					$row2 = $result2->fetch_assoc();
					echo '<p>'.$j.') Title: ' .$row2['title'].' , Availability: '.$row['availability'].'</p><br />';
				}
			}
			elseif ($option == "p") {
				echo '<h3>' . $row['name'] . '</h3><br />';
				echo '<h5> In Publication: <br />';

				$id = $row['id'];

				$query2 = "SELECT ISBN FROM has_published WHERE pub_id='$id'";
				if(!($result2 = $conn->query($query2))) die($conn->error);
				$num_rows2 = $result2->num_rows;
				for ($j=1; $j <= $num_rows2 ; $j++) {	
					$row2 = $result2->fetch_assoc();
					$isbn2 = $row2['ISBN'];

					$query3 = "SELECT title FROM books WHERE ISBN='$isbn2'";
					if(!($result3 = $conn->query($query3))) die($conn->error);
					$row3 = $result3->fetch_assoc();

					echo '<p>'.$j.') Title: ' .$row3['title'].' , ISBN: '.$isbn2.'</p><br />';
				}
			}
		}
		mysqli_close($conn);
	} else {
		echo 'Some error occured.<br />';
	}

	echo '<a href="search.php" class="btn btn-entrance btn-primary my-2 my-sm-0">Πίσω</a>';
	
?>