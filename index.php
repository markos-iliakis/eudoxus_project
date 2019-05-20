<?php
    session_start();
    unset($_SESSION['isbn']);
    unset($_SESSION['sem']);

    if (isset($_SESSION['user_id'])) {
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
                <div class="row">
                    <div class="col-md-9">
                        <div class="container cards-container">
                            <a href="browse.php">
                                <div class="user-container">
                                    <div class="student-card">
                                        <h5 class="card-title">Φοιτητές</h5>
                                        <div class="user-photo-container">
                                            <img src="img/student.png" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="publisher.html">
                                <div class="user-container">
                                    <div class="publisher-card">
                                        <h5 class="card-title">Εκδότες</h5>
                                        <div class="user-photo-container">
                                            <img src="img/publisher.jpg" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="user-container">
                                    <div class="secretary-card">
                                        <h5 class="card-title">Γραμματεία</h5>
                                        <div class="user-photo-container">
                                            <img src="img/university.png" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="user-container">
                                    <div class="distributor-card">
                                        <h5 class="card-title">Διαθέτες</h5>
                                        <div class="user-photo-container">
                                            <img src="img/distributor.jpg" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="container info-container">
                            <h3>Χρήσιμα</h3>
                                <button type="button" class="list-group-item list-group-item-action">Επικοινωνία</button>
                                <button type="button" class="list-group-item list-group-item-action">Συχνές Ερωτήσεις</button>
                                <button type="button" class="list-group-item list-group-item-action">Ενημερωτικό Υλικό</button>
                        </div>
                    </div>
                </div>
            </div>



        </body>

        </html>
        ';
    }
    else {
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
        </head>
        <body style="background-color:#ededed">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
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
                        <li  class="nav-item">
                            <button id="searchButton" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Αναζήτηση</button>
                            <script type="text/javascript">
                                document.getElementById("searchButton").onclick = function () {
                                location.href = "search.php";
                                };
                            </script>
                        </li>
                    </ul>
                    <a href="login.html" class="btn btn-entrance btn-primary my-2 my-sm-0">Είσοδος</a>
            </nav>
            <div class="container main-container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="container cards-container">
                            <a href="browse.php">
                                <div class="user-container">
                                    <div class="student-card">
                                        <h5 class="card-title">Φοιτητές</h5>
                                        <div class="user-photo-container">
                                            <img src="img/student.png" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="user-container">
                                    <div class="publisher-card">
                                        <h5 class="card-title">Εκδότες</h5>
                                        <div class="user-photo-container">
                                            <img src="img/publisher.jpg" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="user-container">
                                    <div class="secretary-card">
                                        <h5 class="card-title">Γραμματεία</h5>
                                        <div class="user-photo-container">
                                            <img src="img/university.png" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="user-container">
                                    <div class="distributor-card">
                                        <h5 class="card-title">Διαθέτες</h5>
                                        <div class="user-photo-container">
                                            <img src="img/distributor.jpg" class="card-img-top">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="container info-container">
                            <h3>Χρήσιμα</h3>
                                <button type="button" class="list-group-item list-group-item-action">Επικοινωνία</button>
                                <button type="button" class="list-group-item list-group-item-action">Συχνές Ερωτήσεις</button>
                                <button type="button" class="list-group-item list-group-item-action">Ενημερωτικό Υλικό</button>
                        </div>
                    </div>
                </div>
            </div>



        </body>

        </html>
        ';
    }

?>
