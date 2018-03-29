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
        <link type="text/css" rel="stylesheet" href="CSS/syllabusBasic.css">
        
        <title>CSCB20 | Syllabus</title>
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
                    <li id = "homeMenuButton">
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
            <div class = "shadow inContentBox">
                    <h3>Grading Scheme</h3>
                    <div class = "table">
                        <div class = "thead">
                            <div class = "row">
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
                                <div class = "cell">Practicals</div>
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
            <div id = "footer">
                <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
                <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
            </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>