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
        <link type="text/css" rel="stylesheet" href="CSS/feedbackBasic.css">
    
        
        <title>CSCB20 | Enter Marks</title>
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
        <div id = "siteWrapper">
        <!-- Main Page Content -->
        <div id = "contentWrapper">
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
            <?php 
                include("php/config.php");
                echo '
                <!-- Display Remark Submission Form -->
                <div id = "window" class = "shadow inContentBox">
                    <div id = "windowHeader">
                        <div id = "windowBtns">
                            <div class = "windowRd circle"></div>
                            <div class = "windowYl circle"></div>
                            <div class = "windowGn circle"></div>
                        </div>
                        <div id = "windowTitle">Enter Marks Page</div>
                    </div>
                    <div id = "windowContent" class="flex_wrapper">
                        <form id ="enterMarkForm" action="php/markSubmit.php" method = "POST">
                            <p id = "errorMsg">';
                                    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                                        echo  $_SESSION['error'];
                                    }
                                echo '
                            </p>
                            <label for="evaluatoin">Select Evaluatoin</label><br>
                            <select placeholder = "evaluation" name="evaluation">';
                                $sqlForEvaluationNames = "SELECT column_name FROM information_schema.columns WHERE table_name = 'Marks'";
                                $resultOfColumnNames = mysqli_query($db, $sqlForEvaluationNames);
                                $columnNames = mysqli_fetch_row($resultOfColumnNames);
                                $columnNames = mysqli_fetch_row($resultOfColumnNames);
                                while ($columnNames = mysqli_fetch_row($resultOfColumnNames)) {
                                    echo "<option value='".$columnNames[0]."'>".$columnNames[0]."</option>";
                                }

                            echo '
                            </select><br><br>

                            <label for="utorid">Select Student\'s UTORid</label><br>
                            <select placeholder = "doe455" name="utorid">';
                                //<?php
                                    
                                    $sql = "SELECT * FROM Student";
                                    $result = mysqli_query($db, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<option value = ".$row["UTORid"].">".$row["UTORid"]."</option>";
                                        }
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                    $db->close();
                                //?
                                echo '
                            </select><br><br>

                            <label for="grade">Student\'s Mark:</label><br>
                            <input type= "text" placeholder = "0" name="grade">
                            <br><br>
                            <input id="submitBtn" type="submit" value="Enter Mark">
                        </form>
                    </div>
                </div>';
                ?>
        </div>
        <!-- Footer -->    
        <div id = "footer">
            <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
            <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
        </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>
