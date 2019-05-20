<?php
	require_once "config.php";

echo '
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/test.css">
		<title> Search Bar </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript">
			function active() {
				var searchBar = document.getElementById(\'searchBar\');

				if (searchBar.value == \'Αναζήτηση...\') {
					searchBar.value = \'\'
					searchBar.placeholder = \'Αναζήτηση...\'
				}
			}

			function inactive() {
				var searchBar = document.getElementById(\'searchBar\');

				if (searchBar.value == \'\') {
					searchBar.value = \'Αναζήτηση...\'
					searchBar.placeholder = \'\'
				}
			}

		</script>
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

	</nav>


		<form action="get_results.php" method="GET" id="searchForm">
			<h3>Επιλογές Αναζήτησης</h3><br>
			<input type="radio" id="option" name="option" value="b" checked>Αναζήτηση Συγγραμμάτων<br>
		  	<input type="radio" id="option" name="option" value="d">Αναζήτηση Σημείων Διανομής<br>
		  	<input type="radio" id="option" name="option" value="p">Αναζήτηση Εκδοτών<br><br>
			<input type="text" name="q" id="searchBar" placeholder="" value="Αναζήτηση..." maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()" />
			<input type="submit" id="searchBtn" value="Go!" />
			<a href="index.php" class="btn btn-entrance btn-primary my-2 my-sm-0">Πίσω</a>
		</form><br />
		</body>
		</html>';
?>
