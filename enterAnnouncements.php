<?php
    // Initialize the session and check if the user is logged in
    session_start();
    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['valid']) && $_SESSION['accountType'] == 'I'){
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
                    <?php
                        if ($_SESSION['accountType'] == "I") {
                            echo '<li> <a href="enterAnnouncements.php">Announcements</a> </li>';
                        }
                    ?>
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
                    <?php
                        if ($_SESSION['accountType'] == "I") {
                            echo '<li> <a href="enterAnnouncements.php">Announcements</a> </li>';
                        }
                    ?>
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
                    <!-- How announcements appear on index page -->
                    <div id ="announcements" class="shadow inContentBox">
                        <h3>Announcements</h3>
                        <!-- Get announcements from DB -->
                        <?php
                            include("php/config.php");
                            $sql = "SELECT * FROM Announcements";
                            $result = mysqli_query($db, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <div class = "announce windowGn">
                                        <span class="exit">&times;</span>
                                        <h4>'.$row['title'].'</h4>
                                        <h5>Posted: '.$row['posted'].'</h5>
                                        <p>'.$row['content'].'</p>
                                    </div>
                                ';
                                }
                            }
                            mysqli_free_result($result);
                            $db->close();
                        ?>
                    </div>

                    <!-- Announcements Submission Form -->
                    <?php
                    if ($_SESSION["accountType"] == 'I') {
                        echo '
                        <div id = "window" class = "shadow inContentBox">
                            <div id = "windowHeader">
                                <div id = "windowBtns">
                                    <div class = "windowRd circle"></div>
                                    <div class = "windowYl circle"></div>
                                    <div class = "windowGn circle"></div>
                                </div>
                                <div id = "windowTitle">Enter Announcements Page</div>
                            </div>
                            <div id = "windowContent" class="flex_wrapper">
                                <form id ="loginForm" action="php/alterEvalSubmit.php" method = "POST">
                                    <br><br>

                                    <label for="newTitleName">Give title for new Announcement:</label><br>
                                    <input type = "text" placeholder = "Title here" name="newTitleName">
                                    <br><br>
                                    <input id="submitBtn" type="submit" value="Submit">
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
