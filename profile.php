<?php
    session_start();
    require_once "config.php";

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    echo '
        <!DOCTYPE html>
        <html lang="utf-8">


        <head>
            <meta charset="utf-8">
        	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/profile.css">
            <script src="js/profile.js"></script>
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

    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($link, "SELECT * FROM users WHERE id = $user_id");


    while($row = mysqli_fetch_array($result)) {

        //if user is a student
        if ($row[1] == 0) {

            $result2 = mysqli_query($link, "SELECT * FROM students WHERE user_id = $user_id");
            $dep_id = -1;

            $applications = array();
            $result5 = mysqli_query($link, "SELECT * FROM applications WHERE user_id = $user_id");
            while($row5 = mysqli_fetch_array($result5)){
                $semester_apps = array();
                array_push($semester_apps, $row5[0], $row5[2]);
                array_push($applications, $semester_apps);
            }
            $app_books = array();
            foreach ($applications as $app) {
                $result6 = mysqli_query($link, "SELECT * FROM app_books WHERE app_id = $app[0]");
                while($row6 = mysqli_fetch_array($result6)){
                    $book_semester = array();
                    array_push($book_semester, $row6[1], $row6[0]);
                    array_push($app_books, $book_semester);
                }
            }

            $books = array();
            foreach ($app_books as $ab) {
                // echo  "SELECT * FROM books WHERE ISBN = '$ab[0]' ";
                $result7 = mysqli_query($link, "SELECT * FROM books WHERE ISBN = '$ab[0]' ");
                while($row7 = mysqli_fetch_array($result7)){
                    $books_w_ISBN = array();
                    array_push($books_w_ISBN, $row7[1], $row7[0]);
                    array_push($books, $books_w_ISBN);
                }
            }


            while($row2 = mysqli_fetch_array($result2)){
                $dep_id = $row2[1];

                $uni_id = -1;
                $result3 = mysqli_query($link, "SELECT * FROM department WHERE uni_id = $dep_id");
                while($row3 = mysqli_fetch_array($result3)){
                    $uni_id = $row2[1];

                    $result4 = mysqli_query($link, "SELECT * FROM universities WHERE id = $uni_id");
                    while ($row4 = mysqli_fetch_array($result4)) {
                        print "<div class=\"container\">
                                <div class=\"row\">
                                    <div class=\"col-lg-12\">
                                     <div class=\"block profile\">
                                        <div class=\"col-sm-12\">
                                            <h1>Στοιχεία Χρήστη<hr></h1>
                                            <div class=\"col-xs-12\">
                                                <h2>$row2[2] $row2[3]</h2>
                                                <p><strong>Ρόλος: </strong> Φοιτητής </p>
                                                <p><strong>Πανεπιστημιακό Ίδρυμα: </strong> $row4[1]</p>
                                                <p><strong>Τμήμα: </strong>$row3[2]</p>
                                                <p><strong>Διεύθυνση: </strong>$row3[3]</p>
                                            </div>
                                        </div>
                                        <div class=\"container\">
                                            <div class=\"row\">

                                                <div class=\"col-xs-4 text-center\">
                                                    <button class=\"btn btn-success btn-block\" data-toggle=\"modal\" data-target=\"#student_uni_change\"><span class=\"fa fa-user\" ></span> Αλλαγή Πανεπιστημιακού Ιδρύματος </button>
                                                </div>
                                                <div class=\"col-xs-4 text-center\">
                                                    <button class=\"btn btn-info btn-block\" data-toggle=\"modal\" data-target=\"#student_apps_history\"><span class=\"glyphicon glyphicon-timer\" ></span> Ιστορικό Δηλώσεων </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"modal fade\" id=\"student_uni_change\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"student_apps_history\" aria-hidden=\"true\">
                                          <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                                            <div class=\"modal-content\">
                                              <div class=\"modal-header\">
                                                <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Εισάγετε το νέο σας Ίδρυμα</h5>
                                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                  <span aria-hidden=\"true\">&times;</span>
                                                </button>
                                              </div>
                                                  <div class=\"modal-body\">
                                                  <form class=\"login-form\" action=\"student_edit.php\" method=\"post\">
                                                      <select name=\"university\" class=\"form-control uni-control popup-form\">
                                                         <option value=\"\" disabled selected>Επιλέξτε Ίδρυμα</option>
                                                         <option value=\"ekpa\">Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                                                         <option value=\"ntua\">Εθνικό Μετσόβειο Πολυτεχνείο</option>
                                                         <option value=\"aueb\">Οικονομικό Πανεπιστήμιο Αθηνών</option>
                                                       </select>
                                                       <div class=\"d-none popup-form\" id=\"ekpa-selection\">
                                                           <select name=\"department\" class=\"form-control\">
                                                              <option value=\"\" disabled selected>Επιλέξτε Τμήμα</option>
                                                              <option value=\"dit\">Πληροφορικής και Τηλεπικοινωνιών</option>
                                                               <option value=\"math\">Μαθηματικό</option>
                                                            </select>
                                                       </div>
                                                       <div class=\"d-none popup-form\" id=\"aueb-selection\">
                                                            <select class=\"form-control\">
                                                                <option value=\"\" disabled selected>Επιλέξτε Τμήμα</option>
                                                               <option value=\"dit2\">Πληροφορικής και Τηλεματικής</option>
                                                               <option value=\"det\">Διοίκηση Επιχειρήσεων</option>
                                                            </select>
                                                       </div>
                                                       <div class=\"d-none popup-form\" id=\"ntua-selection\">
                                                            <select class=\"form-control\">
                                                                <option value=\"\" disabled selected>Επιλέξτε Τμήμα</option>
                                                              <option value=\"hmmy\">Ηλεκτρολόγων Μηχανικών - Μηχανικών Ηλ. Υπολογιστών</option>
                                                              <option value=\"mm\">Μηχανολόγων Μηχανικών</option>
                                                            </select>
                                                       </div>
                                                      <div class=\"modal-footer\">
                                                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Ακύρωση</button>
                                                         <button type=\"submit\" class=\"btn btn-primary\">Αλλαγή</button>
                                                      </div>
                                                  </form>
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class=\"modal fade\" id=\"student_apps_history\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"student_apps_history\" aria-hidden=\"true\">
                                          <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                                            <div class=\"modal-content\">
                                              <div class=\"modal-header\">
                                                <h5 class=\"modal-title\" id=\"apps_history_title\">Ιστορικό δηλώσεων</h5>
                                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                  <span aria-hidden=\"true\">&times;</span>
                                                </button>
                                              </div>
                                              <div class=\"modal-body\">";
                                                foreach ($applications as $app) {
                                                    print "<h4>Εξάμηνο: $app[1] <hr></h4><ul>";
                                                    foreach ($app_books as $ab) {

                                                        if ($ab[1] == $app[0]) {

                                                            foreach ($books as $bk) {

                                                                if ($ab[0] == $bk[1]){

                                                                    print "<li>$bk[0]</li>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    print "</ul>";
                                                }

                                        echo"    </ul></div>
                                          </div>
                                        </div>
                                </div>
                            </div>
                        </body>
                        </html>";
                    }
                }
            }
        }
        else{
            $result2 = mysqli_query($link, "SELECT * FROM publisher WHERE id = $user_id");

            while($row2 = mysqli_fetch_array($result2)){
                print "<div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                             <div class=\"block profile publisher\">
                                <div class=\"col-sm-12\">
                                    <h1>Στοιχεία Χρήστη<hr></h1>
                                    <div class=\"col-xs-12\">
                                        <h2>$row2[1]</h2>
                                        <p><strong>Ρόλος: </strong> Εκδότης </p>
                                        <p><strong>Διεύθυνση: </strong>$row2[2]</p>
                                    </div>
                                </div>
                                <div class=\"container\">
                                    <div class=\"row\">
                                    <div class=\"col-xs-4 text-center\">
                                        <button class=\"btn btn-info btn-block\" data-toggle=\"modal\" data-target=\"#publisher_change_address\"><span class=\"glyphicon glyphicon-timer\" ></span> Αλλαγή Διεύθυνσης </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"modal fade\" id=\"publisher_change_address\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"publisher_change_address\" aria-hidden=\"true\">
                              <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                                <div class=\"modal-content\">
                                  <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"apps_history_title\">Παρακαλώ εισάγετε τη νέα σας διεύθυνση</h5>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                      <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                  </div>
                                  <form class=\"change-address-form\" action=\"publisher_edit.php\" method=\"post\">
                                      <div class=\"form-group publisher-control\">
                                          <label for=\"publisher_address\" class=\"address\">Διεύθυνση</label>
                                          <input type=\"text\" class=\"form-control\" placeholder=\"Address\" name=\"publisher_address\" required>
                                      </div>
                                      <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Ακύρωση</button>
                                            <button type=\"submit\" class=\"btn btn-primary\">Αλλαγή</button>
                                      </div>
                                  </form>
                                  </div>
                              </div>
                            </div>
                    </div>
                    </div>
                </body>
                </html>";
            }
        }
     }

        mysqli_close($link);

?>
