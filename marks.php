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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="index.html#courseTeam">Course Team</a>
                    </li>
                    <li>
                        <a href="syllabus.html">Syllabus</a>
                    </li>
                    <li>
                        <a href="assignment.html"  for="toggle">Assignment</a>
                    </li>
                    <li>
                        <a href="https://markus.utsc.utoronto.ca/cscb20w18" target="_blank">Markus</a>
                    </li>
                    <li>
                        <a href="https://www.piazza.com/utoronto.ca/winter2018/cscb20h3" target="_blank">Piazza</a>
                    </li>
                    <li>
                        <a href="feedback.html">Feedback</a>
                    </li>
                    <li>
                        <a href="http://www.utsc.utoronto.ca/iits/computer-labs" target="_blank">UTSC Labs</a>
                    </li>
                </ul>
            </div>
            <!-- Side Bar Menu -->
            <div id = "sideNav">
                <ul>
                    <!-- Source of uoft svg file is form: https://www.utoronto.ca/ -->
                    <li class = "homeMenuButton">
                        <img src = "img/uoft.svg">
                    </li>
                    <li>
                        <input class="search" type="text" placeholder="Search..">
                    </li>
                    <li>
                        <a href="index.html"
                           class="underLine">Home</a>
                    </li>
                    <li>
                        <a href="index.html#courseTeam">Course Team</a>
                    </li>
                    <li>
                        <a  href="syllabus.html">Syllabus</a>
                    </li>
                    <li>
                        <a href="assignment.html">Assignment</a>
                    </li>
                    <li>
                        <a href="https://markus.utsc.utoronto.ca/cscb20w18"  target="_blank">Markus</a>
                    </li>
                    <li>
                        <a href="https://www.piazza.com/utoronto.ca/winter2018/cscb20h3"  target="_blank">Piazza</a>
                    </li>
                    <li>
                        <a href="feedback.html">Feedback</a>
                    </li>
                    <li>
                        <a href="http://www.utsc.utoronto.ca/iits/computer-labs" target="_blank">UTSC Labs</a>
                    </li>
                </ul>
            </div>
            <div id="siteWrapper">
            <!-- Main Page Content -->
            <div id = "contentWrapper">
                <div id="marks" class = "shadow inContentBox">
                    <h3>Course Marks</h3>
                    <div class = "table">
                        <div class = "thead">
                            <div class = "row">
                                <div class = "cell">UTORid</div>
                                <div class = "cell">Quiz 1</div>
                                <div class = "cell">Assingment 1</div>
                                <div class = "cell">Midterm</div>
                                <div class = "cell">Quiz 2</div>
                                <div class = "cell">Assingment 2</div>
                                <div class = "cell">Quiz 3</div>
                                <div class = "cell">Assingment 3</div>
                                <div class = "cell">Practicals</div>
                                <div class = "cell">Final</div>
                            </div>
                        </div>
                        <div class = "tbody">
                            <!-- Practicals -->
                            <div class = "row">
                                <div class = "cell"></div>
                                <div class = "cell">5%</div>
                                <div class = "cell">Last day of class</div>
                            </div>
                            <!-- Final -->
                            <div class = "row">
                                <div class = "cell">Final Exam</div>
                                <div class = "cell">40%</div>
                                <div class = "cell">April 21st @ 2pm - 4pm (Rm: SY110)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id = "window" class = "shadow inContentBox">
                <div id = "windowHeader">
                    <div id = "windowBtns">
                        <div class = "windowRd circle"></div>
                        <div class = "windowYl circle"></div>
                        <div class = "windowGn circle"></div>
                    </div>
                    <div id = "windowTitle">Login Page</div>
                </div>
                <div id = "windowContent">
                    <form id ="loginForm" action="php/remarkSubmit.php" method = "POST">
                        <p id = "loginErrorMsg">
                            <?php
                                session_start();
                                if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                                    echo  $_SESSION['error'];
                                }
                            ?>
                        </P>
                        <label for="evaluatoin">Select Evaluatoin</label><br>
                        <datalist type="text" placeholder = "evaluation" name="evaluation">
                            <option value="Quiz 1">
                            <option value="Assignment 1">
                            <option value="Midterm">
                            <option value="Quiz 2">
                            <option value="Assignment 2">
                            <option value="Quiz 3">
                            <option value="Assignment 3">
                            <option value="Practicals">
                        </datalist>
                        <label for="ta">Select T.A. to Remark</label><br>
                        <datalist type="text" placeholder = "John Doe" name="ta">
                            <?php
                                include("php/config.php");
                                $sql = "SELECT * FROM TA";
                                $result = mysqli_query($db, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysql_fetch_assoc($result)){
                                        echo "<option value = ".$row["First"]." ".$row["Last"].">\n";
                                    }
                                }
                                $db->close();
                            ?>
                        </datalist>
                        <label for="remarkReason">Reason For Remark:</label><br>
                        <textarea type="text" placeholder = "Comments..." name="remarkReason"><br><br>
                        <input id="submitBtn" type="submit" value="Request">
                    </form>
                </div>
            </div>
            <div id = "footer">
                <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
                <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
            </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>