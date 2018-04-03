<?php
    // Initialize the session and check if the user is logged in
    session_start();
    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['valid'])){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable = yes, width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/tree.png">
        <!--Links-->
		<link type="text/css" rel="stylesheet" href="CSS/basicIndex.css">
        <link type="text/css" rel="stylesheet" href="CSS/marksBasic.css">
        
        <title>CSCB20 | Marks</title>
    </head>
    <body>
            <!-- Mobile Menu -->
            <div id = "mobileNav">
                <h1>CSCB20</h1>
                <h2>CSCB20: Intro to Databases and Web Applications</h2>
                <button id = "mobileNavBtn" for="toggleNav" onclick="toggleDisplay()">
                    <div class = "bar1"></div>
                    <div class = "bar2"></div>
                    <div class = "bar3"></div>
                </button>
            </div>
            <div id = mobileNavDrop >
                <input type="checkbox" id="toggleNav"/>
                <ul>
                    <li>
                        <input class="search" type="text" placeholder="Search..">
                    </li>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#courseTeam">Course Team</a>
                    </li>
                    <?php
                        // Determine weather to display a set of marks for a Student or
                        // all marks for an Instructor
                         if ($_SESSION['accountType'] == "S") {
                             echo '<li> <a href="marks.php">Course Marks</a> </li>';
                         } else if ($_SESSION['accountType'] == "I") {
                             echo '<li> <a href="marks.php">All Marks</a> </li>';
                         }
                    ?>
                    <li>
                        <a href="syllabus.php">Syllabus</a>
                    </li>
                    <li>
                        <a href="assignment.php" for="toggle">Assignment</a>
                    </li>
                    <li>
                        <a href="https://markus.utsc.utoronto.ca/cscb20w18" target="_blank">Markus</a>
                    </li>
                    <li>
                        <a href="https://www.piazza.com/utoronto.ca/winter2018/cscb20h3" target="_blank">Piazza</a>
                    </li>
                    <li>
                        <a href="feedback.php">Feedback</a>
                    </li>
                    <?php
                        // Determine weather to display a set of remarks for a TA or
                        // all marks for an Instructor
                         if ($_SESSION['accountType'] == "T") {
                             echo '<li> <a href="remarks.php">My Remarks</a> </li>';
                         } else if ($_SESSION['accountType'] == "I") {
                             echo '<li> <a href="remarks.php">All Remarks</a> </li>';
                         }

                        // Determine weather to display a enter marks fucntion
                        // for a TA/Instructor
                         if ($_SESSION['accountType'] == "T" || $_SESSION['accountType'] == "I") {
                             echo '<li> <a href="enterMarks.php">Enter marks</a> </li>';
                         }
                    ?>
                    <li>
                        <a href="http://www.utsc.utoronto.ca/iits/computer-labs" target="_blank">UTSC Labs</a>
                    </li>
                    <li>
                        <a href="php/logoutSubmit.php"> LOGOUT </a>
                    </li>
                </ul>
            </div>
            <!-- Side Bar Menu -->
            <div id = "sideNav">
                <ul>
                    <!-- Source of uoft svg file is form: https://www.utoronto.ca/ -->
                    <li id = "homeMenuButton">
                        <img src = "img/uoft.svg"/>
                    </li>
                    <li>
                        <input class="search" type="text" placeholder="Search..">
                    </li>
                    <li>
                        <a href="index.php" class="underLine">Home</a>
                    </li>
                    <li>
                        <a href="#courseTeam">Course Team</a>
                    </li>
                    <?php
                        // Determine weather to display a set of marks for a Student or
                        // all marks for an Instructor
                         if ($_SESSION['accountType'] == "S") {
                             echo '<li> <a href="marks.php">Course Marks</a> </li>';
                         } else if ($_SESSION['accountType'] == "I") {
                             echo '<li> <a href="marks.php">All Marks</a> </li>';
                         }
                    ?>
                    <li>
                        <a href="syllabus.php">Syllabus</a>
                    </li>
                    <li>
                        <a href="assignment.php">Assignment</a>
                    </li>
                    <li>
                        <a href="https://markus.utsc.utoronto.ca/cscb20w18"  target="_blank">Markus</a>
                    </li>
                    <li>
                        <a href="https://www.piazza.com/utoronto.ca/winter2018/cscb20h3"  target="_blank">Piazza</a>
                    </li>
                    <li>
                        <a href="feedback.php">Feedback</a>
                    </li>
                    <?php
                        // Determine weather to display a set of remarks for a TA or
                        // all marks for an Instructor
                         if ($_SESSION['accountType'] == "T") {
                             echo '<li> <a href="remarks.php">My Remarks</a> </li>';
                         } else if ($_SESSION['accountType'] == "I") {
                             echo '<li> <a href="remarks.php">All Remarks</a> </li>';
                         }

                        // Determine weather to display a enter marks fucntion
                        // for a TA/Instructor
                         if ($_SESSION['accountType'] == "T" || $_SESSION['accountType'] == "I") {
                             echo '<li> <a href="enterMarks.php">Enter marks</a> </li>';
                         }
                    ?>
                    <li>
                        <a href="http://www.utsc.utoronto.ca/iits/computer-labs" target="_blank">UTSC Labs</a>
                    </li>
                    <li>
                        <a href="php/logoutSubmit.php"> LOGOUT </a>
                    </li>
                </ul>
            </div>
            <div id="siteWrapper">
                <!-- Main Page Content -->
                <div id = "contentWrapper">
                    <!-- Header -->
                    <div id = "header" class="shadow inContentBox">
                        <h1>
                            CSCB20: Introduction to Databases and Web Applications
                            <?php
                                if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                    echo  "Welcome ".$_SESSION['user_name']."!";
                                }
                            ?>
                        </h1>
                    </div>
                    <!-- Display Student's Marks -->
                    <div id="marks" class = "shadow inContentBox">
                        <h3>Course Marks</h3>
                        <div class = "table">
                            <div class = "thead">
                                <div class = "row">
                                    <?php
                                        include("php/config.php");
                                        $sqlForEvaluationNames = "SELECT column_name FROM information_schema.columns WHERE table_name = 'Marks'";
                                        $resultOfColumnNames = mysqli_query($db, $sqlForEvaluationNames);
                                        $numOfColums = mysqli_num_rows($resultOfColumnNames);
                                        if ($numOfColums > 0) {
                                            $columnNames = mysqli_fetch_row($resultOfColumnNames);
                                        
                                        while ($columnNames = mysqli_fetch_row($resultOfColumnNames)) {
                                            echo '<div class = "cell">'.$columnNames[0].'</div>';
                                        }
                                    /*<div class = "cell">UTORid</div>
                                    <div class = "cell">Quiz 1</div>
                                    <div class = "cell">Assingment 1</div>
                                    <div class = "cell">Midterm</div>
                                    <div class = "cell">Quiz 2</div>
                                    <div class = "cell">Assingment 2</div>
                                    <div class = "cell">Quiz 3</div>
                                    <div class = "cell">Assingment 3</div>
                                    <div class = "cell">Practicals</div>
                                    <div class = "cell">Final</div>*/
                                echo '</div>
                            </div>
                            <div class = "tbody">';

                                    if ($_SESSION['accountType'] == 'S') {

                                    echo '<div class = "row">';
                                
                                        
                                        $sql = "SELECT * FROM Marks WHERE UTORid =".$_SESSION['UTORid'];
                                        $result = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                while ($columnNames = mysqli_fetch_row($resultOfColumnNames)) {
                                                    echo '<div class = "cell">'.$row[$columnNames[0]].'</div>';
                                                }
                                               /* echo '
                                                <div class = "cell">'.$row['UTORid'].'</div>
                                                <div class = "cell">'.$row['q1'].'</div>
                                                <div class = "cell">'.$row['a1'].'</div>
                                                <div class = "cell">'.$row['midterm'].'</div>
                                                <div class = "cell">'.$row['q2'].'</div>
                                                <div class = "cell">'.$row['a2'].'</div>
                                                <div class = "cell">'.$row['q3'].'</div>
                                                <div class = "cell">'.$row['a3'].'</div>
                                                <div class = "cell">'.$row['practicals'].'</div>
                                                <div class = "cell">'.$row['final'].'</div>';*/
                                            }
                                        }
                                        // Free result set
                                        mysqli_free_result($result);
                                        $db->close();
                                    echo '
                                </div>';

                            } else if ($_SESSION['accountType'] == 'I') {
                                $sql = "SELECT * FROM Marks";
                                $result = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<div class = "row">';
                                            while ($columnNames = mysqli_fetch_row($resultOfColumnNames)) {
                                                echo '<div class = "cell">'.$row[$columnNames[0]].'</div>';
                                            }
                                            /*echo '
                                            <div class = "row">
                                                <div class = "cell">'.$row['UTORid'].'</div>
                                                <div class = "cell">'.$row['q1'].'</div>
                                                <div class = "cell">'.$row['a1'].'</div>
                                                <div class = "cell">'.$row['midterm'].'</div>
                                                <div class = "cell">'.$row['q2'].'</div>
                                                <div class = "cell">'.$row['a2'].'</div>
                                                <div class = "cell">'.$row['q3'].'</div>
                                                <div class = "cell">'.$row['a3'].'</div>
                                                <div class = "cell">'.$row['practicals'].'</div>
                                                <div class = "cell">'.$row['final'].'</div>
                                            </div>';*/
                                            echo '</div>';
                                        }
                                        // Row of the avrage for each evaluation 
                                        echo '
                                            <div class = "row">
                                                <div class = "cell">'.$row['UTORid'].'</div>
                                                <div class = "cell">'.$row['q1'].'</div>
                                                <div class = "cell">'.$row['a1'].'</div>
                                                <div class = "cell">'.$row['midterm'].'</div>
                                                <div class = "cell">'.$row['q2'].'</div>
                                                <div class = "cell">'.$row['a2'].'</div>
                                                <div class = "cell">'.$row['q3'].'</div>
                                                <div class = "cell">'.$row['a3'].'</div>
                                                <div class = "cell">'.$row['practicals'].'</div>
                                                <div class = "cell">'.$row['final'].'</div>
                                            </div>';
                                // Free result set
                                mysqli_free_result($result);
                                $db->close();
                            }
                        }
                            ?>
                        </div>
                       </div>
                    </div>
                    <?php 
                    if ($_SESSION['accountType'] == 'S') {
                        echo '
                    <!-- Display Remark Submission Form -->
                    <div id = "window" class = "shadow inContentBox">
                        <div id = "windowHeader">
                            <div id = "windowBtns">
                                <div class = "windowRd circle"></div>
                                <div class = "windowYl circle"></div>
                                <div class = "windowGn circle"></div>
                            </div>
                            <div id = "windowTitle">Remark Request Page</div>
                        </div>
                        <div id = "windowContent" class="flex_wrapper">
                            <form id ="loginForm" action="php/remarkSubmit.php" method = "POST">
                                <p id = "loginErrorMsg">';
                                    //<?php
                                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                                            echo  $_SESSION['error'];
                                        }
                                    //?
                                    echo '
                                </p>

                                <label for="evaluatoin">Select Evaluatoin</label><br>
                                <select placeholder = "evaluation" name="evaluation">
                                ';
                                while ($columnNames = mysqli_fetch_row($resultOfColumnNames)) {
                                    echo "<option value='".$row[$columnNames[0]]."'>".$row[$columnNames[0]]."</option>";
                                }
                                
                               /* echo '
                                    <option value="Quiz 1">Quiz 1</option>
                                    <option value="Assignment 1">Assignment 1</option>
                                    <option value="Midterm">Midterm</option>
                                    <option value="Quiz 2">Quiz 2</option>
                                    <option value="Assignment 2">Assignment 2</option>
                                    <option value="Quiz 3"> Quiz </option>
                                    <option value="Assignment 3">Assignment 3</option>
                                    <option value="Practicals">Practicals</option>*/
                                echo '
                               </select><br><br>

                                <label for="ta">Select T.A. to Remark</label><br>
                                <select placeholder = "John Doe" name="ta">';
                                    include("php/config.php");
                                    $sql = "SELECT * FROM TA";
                                    $result = mysqli_query($db, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<option value = ".$row["UTORid"].">".$row["First"]." "
                                                    .$row["Last"]."</option>";
                                        }
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                    $db->close();
                                    echo '
                                </select><br><br>

                                <label for="remarkReason">Reason For Remark:</label><br>
                                <textarea placeholder = "Comments..." name="remarkReason"></textarea>
                                <br><br>
                                <input id="submitBtn" type="submit" value="Request">
                            </form>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
                <div id = "footer">
                    <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
                    <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
                </div>
            </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>