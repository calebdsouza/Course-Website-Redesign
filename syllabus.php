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
        <div id = "intorWrapper">
        
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
                <div id = "header" class="shadow inContentBox">
                        <h1 >
                        CSCB20: Introduction to Databases and Web Applications
                        </h1>
    
                </div>
                <div id = "syllabus" class="shadow inContentBox">
                    <h3>Syllabus</h3>
                    <div class="accordion-wrapper">
                        <!-- Week 1 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 1 | Topic: Course Overview &amp; The Internet</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Jan. 8th, 2018<br>
                                    Lecture Slides: <a href="Slides/w1.pdf">overview</a><br>
                                    Lab: <a href="Labs/lab1.pdf">lab1 handout</a>, <a href="Labs/lab1_starter_code.zip">starter code</a><br>
                                    Readings:<br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 2 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 2 | Topic: Intro to Databases &amp; Rational Algebra Part I</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Jan. 15th, 2018<br>
                                    Lecture Slides: <a href="Slides/w2.pdf">rational algebra</a><br>
                                    Lab: <a href="Labs/lab2.pdf">lab2 handout (sample data)</a><br>
                                    Readings: <br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 3 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 3 | Topic: Rational Algebra Part II</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Jan. 22th, 2018<br>
                                    Lecture Slides: <a href="Slides/w3.pdf">SQL and MySQL</a><br>
                                    Lab: <a href="Labs/lab3.htm">lab3 handout</a> (setting up MySQL)<br>
                                    Readings<br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 4 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 4 | Topic: SQL &amp; MySQL</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Jan. 29th, 2018<br>
                                    Lecture Slides: <a href="Slides/w4.pdf">joins and views in SQL part I</a><br>
                                    Lab: <a href="Labs/Lab4.pdf">lab4 handout</a>, <a href="Labs/university.mssql">universty sql dump</a>, <a href="Labs/lab4_soln.pdf">lab4 solution</a>, <a href="Labs/Use%20SQL%20on%20MathLab.htm">using sql on MathLab</a><br>
                                    Readings:<br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 5 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 5 | Topic: Types of SQL Joins</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Feb. 5th, 2018<br>
                                    Lecture Slides: <a href="Slides/w4.pdf">joins and views in SQL part II</a><br>
                                    Lab: <a href="Labs/lab5.pdf">lab5 handout</a><br>
                                    Readings<br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 6 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 6 | Midterm!</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Good Luck!
                                </p>
                            </div>
                        </div>
                        <!-- Week 7 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 7 | Topic: HTML and CSS Part I</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: Jan. 26th, 2018<br>
                                    Lecture Slides: <a href="Slides/w7.pdf">html and css</a><br>
                                    Lab: <a href="Labs/lab7.html">lab7 handout</a> (css)<br>
                                    Readings<br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 8 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 8 | Topic: HTML and CSS Part II &amp; JavaScript Part I</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    Date: March 5th, 2018<br>
                                    Lecture Slides: no slides, in class examples<br>
                                    Lab: work on a2<br>
                                    Readings: <a href="https://css-tricks.com/multiple-class-id-selectors/" target="_blank"> classes, ids, selectors</a><br>
                                </p>
                            </div>
                        </div>
                        <!-- Week 9 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 9</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    No Other Content Avaiable
                                </p>
                            </div>
                        </div>
                        <!-- Week 10 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 10</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    No Other Content Avaiable
                                </p>
                            </div>
                        </div>
                        <!-- Week 11 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 11</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    No Other Content Avaiable
                                </p>
                            </div>
                        </div>
                        <!-- Week 12 -->
                        <div class="accordion">
                            <div class="accordion_header">
                                <h4>Week 12</h4>
                            </div>
                            <div class="accordion_content">
                                <p>
                                    No Other Content Avaiable 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id = "footer">
                    <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
                    <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
                </div>
            </div>
        </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>
