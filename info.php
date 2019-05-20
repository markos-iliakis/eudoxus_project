<?php
    session_start();
    require_once "config.php";

    $query2 = "SELECT name , until_date FROM universities";

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
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/test.css">
        <link rel="stylesheet" type="text/css" href="css/info.css">
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
            </li>';

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
    </nav>
    <div class="container main-container">

    <header class="jumbotron my-4">
        <h1 class="display-5">Οδηγιες Χρησης</h1>
        <p class="lead">Ο φοιτητής εισέρχεται στην εφαρμογή φοιτητών του Ευδόξου όπου και γίνεται η πιστοποίηση - εξουσιοδότησή του (μέσω Shibboleth) με όνομα χρήστη και κωδικό πρόσβασης, τα οποία έχει λάβει από το οικείο του Τμήμα.</p>

    </header>

    <div class="row text-center">';

    // print deadlines
    if($result2->num_rows > 0){
        $row = $result2->fetch_assoc();

        echo '<div class="col-lg-3 col-md-3 mb-4">
          <div class="card">
          <h4 class="card-title my-title">Δήλωση μέχρι '.$row['until_date'].'</h4>
            <img class="card-img-top" src="img/todo.png" alt="">
            <div class="card-body">
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <a href=#" class="btn btn-primary">Δήλωσε!</a>
            </div>
          </div>
        </div>';
    }

    // print distribution points

    echo '<div class="col-lg-3 col-md-3 mb-4">
        <div class="card">
        <h4 class="card-title my-title">Σημεία Διανομής Συγγραμματων</h4>
        <img class="card-img-top" src="img/store.png" alt="">
        <div class="card-body">

            <p class="card-text"></p>
        </div>
        <div class="card-footer">
            <a href="map.php" class="btn btn-primary">Χάρτης!</a>
        </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 mb-4">
            <div class="card">
            <h4 class="card-title my-title" id="termsId">Οροι και Προυποθεσεις</h4>
                <img class="card-img-top my-image" src="img/terms.jpg" alt="">
                <div class="card-body">

                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <a href="Files/Terms_and_Conditions_Plus.pdf" class="btn btn-primary">Διαβασε!</a>
                </div>
            </div>
        </div>
    ';


    echo '
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
