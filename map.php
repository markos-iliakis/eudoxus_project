<?php
session_start();
require_once "config.php";
$query1 = "SELECT address FROM distribution";
// connect to db
if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

// get distribution points
if(!($result1 = $conn->query($query1))) die($conn->error);

echo '<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Distribution Points</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false"
          type="text/javascript"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
          <link rel="stylesheet" type="text/css" href="css/register.css">
          </head>
<body>
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
            <a class="dropdown-item" href="#">Διαχείριση Δηλώσεων</a>
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

    ';

    if (isset($_SESSION['user_id'])) {
        echo '<li class="nav-item">
        <a class="nav-link" href="profile.php" role="button" aria-haspopup="true" aria-expanded="false">
            Προφίλ</a>
        </li></ul>';
    }
    else {
        echo '</ul><a href="login.html" class="btn btn-entrance btn-primary my-2 my-sm-0">Είσοδος</a>';
    }
    echo '
    <li  class="nav-item">
                <button id="searchButton" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Αναζήτηση</button>
                <script type="text/javascript">
                    document.getElementById("searchButton").onclick = function () {
                    location.href = "search.php";
                    };
                </script>
            </li>
    </nav><div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
      [\'';
      if($result1->num_rows > 0){
        $row = $result1->fetch_assoc();
        echo $row['address'];
        echo '\', 37.981059, 23.731077, 1],
        [\'';
      }
      if($result1->num_rows > 0)
        $row = $result1->fetch_assoc();
        echo $row['address'];
      echo '\', 37.983206, 23.732826, 2]
    ];

    var map = new google.maps.Map(document.getElementById(\'map\'), {
      zoom: 15,
      center: new google.maps.LatLng(37.9789748, 23.7362975),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, \'click\', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>';

mysqli_close($conn);
?>
