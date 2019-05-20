<?php
    require_once "config.php";

    $query2 = "SELECT id, name FROM universities";


    // connect to db
    if(($conn=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME))->connect_error) die($conn->connect_error);

    // get deadlines
    if(!($result2 = $conn->query($query2))) die($conn->error);

    echo '
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/test.css">
        <link rel="stylesheet" type="text/css" href="css/info.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/browse.js"></script>
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

            </nav>
    <div class="container main-container">

    <header class="jumbotron my-4">
        <h1 class="display-5">Κατάλογος Συγγραμμάτων</h1>
        <p class="lead">Περιηγηθείτε ανά Εκπαιδευτικό Ίδρυμα και ανά σχολή στον κατάλογο των προσφερόμενων συγγραμμάτων από τον Εύδοξο.</p>

    </header>

    <div class="row text-center">

    ';

    echo '<div class="container col-md-9" id="results">';

    $count = 0;
    while($result2->num_rows > $count){
        $row = $result2->fetch_assoc();

        echo '<div class="col-xs-3 card-container">
          <div class="card">
            <div class="user-photo-container">
                <img src="img/university.png" class="card-img-top">
            </div>
            <div class="card-body" data-choice = '.$row['name'].'>
              <p class="card-text"> '.$row['name'].'</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" onclick="getDepartments('.$row['id'].')">
            </div>
          </div>
        </div>';

        ++$count;
    }

    echo '<div class="col-xs-3 card-container">
          <div class="card">
            <img class="card-img-top" src="img/chevron-left.svg" alt="">
            <div class="card-body" data-choice = '.$row['name'].'>
              <p class="card-text">Back</p>
            </div>
            <div class="card-footer">
              <a href="index.php" class="btn btn-primary"></a>
            </div>
          </div>
        </div><br>';

    echo '</div>
            <div class="col-md-3">
                <div class="container info-container">
                    <h3>Χρήσιμα</h3>
                        <button type="button" class="list-group-item list-group-item-action">Επικοινωνία</button>
                        <button type="button" class="list-group-item list-group-item-action">Συχνές Ερωτήσεις</button>
                        <button type="button" class="list-group-item list-group-item-action">Ενημερωτικό Υλικό</button>
                </div>
            </div>
    </form>
    </div>
    </div>
    </body>

    </html>
    ';

    mysqli_close($conn);
?>
