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
        <link type="text/css" rel="stylesheet" href="CSS/courseTeamBasic.css">
    
        
        <title>CSCB20: Intro to Databases and Web Applications</title>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#courseTeam">Course Team</a>
                    </li>
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
                    <li>
                        <a href="marks.php">Course Marks</a>
                    </li>
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
                <div id = "header" class="shadow inContentBox">
                    <h1 >
                    <?php
                        if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                            echo  $_SESSION['user_name'];
                        }
                    ?>
                    CSCB20: Introduction to Databases and Web Applications
                    </h1>

                </div>

                <div class="announce windowYl new">
                    <span class="exit">&times;</span> 
                    <p>
                        Quiz 2 is moved to Monday March 12th! Will cover HTML, CSS and JavaScript.
                    </p>
                </div>
                
                <!-- Basic Course Information -->
                <div id = "window" class = "shadow inContentBox">
                    <div id = "windowHeader">
                        <div id = "windowBtns">
                            <div class = "windowRd circle"></div>
                            <div class = "windowYl circle"></div>
                            <div class = "windowGn circle"></div>
                        </div>
                        <div id = "windowTitle">Course Info</div>
                    </div>
                    <div id = "windowContent">
                        <code>
                            cscb20.name
                            <br> > "Introduction to Databases and Web Applications"
                            <br>
                            <br>
                            cscb20.instructor
                            <br> > "Abbas  Attarwala"
                            <br>
                            <br>
                            cscb20.contact
                            <br> > "<a target="_blank" href="mailto:abbas.attarwala@utoronto.ca?subject=CSCB20">abbas.attarwala@utoronto.ca</a>"
                            <br>
                            <br>
                            cscb20.lecture_time
                            <br> > "Mondays 9am - 11am, Room: SW 319"
                            <br>
                            <br>
                            cscb20.prerequisites
                            <br> > "This course may not be
taken after - or concurrently with - any C- or D-level CSC course."
                            <br>
                            <br>
                            cscb20.office_hours
                            <br> > "Mondays and Fridays, 11:30am - 1:30pm, Office: IC 478"
                            <br>
                            <br>
                            cscb20.links
                            <br> > ["course_website", "<a href="https://markus.utsc.utoronto.ca/cscb20w18">markus</a>", "<a href="file:///Users/cd/Desktop/CourseSiteRedesign/piazza.com/utoronto.ca/winter2018/cscb20h3">piazza</a>"]
                        </code>
                    </div>
                </div>
                
                <div class = "shadow inContentBox">
                    <h3>Course Description</h3>
                    <p>A practical introduction to databases and Web app development. Databases: terminology and applications; creating, querying and updating databases; the entity-relationship model for database design. Web documents and applications: static and interactive documents; Web servers and dynamic server-generated content; Web application development and interface with databases.</p>
                </div>
                
                <div class = "shadow inContentBox">
                    <h3>Grading Scheme</h3>
                    <div class = "table">
                        <div class = "thead">
                            <div class = "row">
                                <div class = "cell">Valuation</div>
                                <div class = "cell">Weight</div>
                                <div class = "cell">Due</div>
                            </div>
                        </div>
                        <div class = "tbody">
                            <!-- Quiz1 -->
                            <div class = "row">
                                <div class = "cell">Quiz 1</div>
                                <div class = "cell">3%</div>
                                <div class = "cell">Jan. 29th (during lecture)</div>
                            </div>
                            <!-- A1 -->
                            <div class = "row">
                                <div class = "cell">Assignment 1</div>
                                <div class = "cell">10%</div>
                                <div class = "cell">February 9th @ 11:59pm (Markus)</div>
                            </div>
                            <!-- Midterm -->
                            <div class = "row">
                                <div class = "cell">Midterm Exam)</div>
                                <div class = "cell">15%</div>
                                <div class = "cell">12th February (during lucture)</div>
                            </div>
                            <!-- Quiz2 -->
                            <div class = "row">
                                <div class = "cell">Quiz 2</div>
                                <div class = "cell">3%</div>
                                <div class = "cell">March 12th (during lecture)</div>
                            </div>
                            <!-- A2 -->
                            <div class = "row">
                                <div class = "cell">Assignment 2</div>
                                <div class = "cell">10%</div>
                                <div class = "cell">March 9th @ 11:59pm (Markus)</div>
                            </div>
                            <!-- A3 -->
                            <div class = "row">
                                <div class = "cell">Assignment 3</div>
                                <div class = "cell">10%</div>
                                <div class = "cell">March 30th @ 11:59pm (Markus)</div>
                            </div>
                            <!-- Quiz3 -->
                            <div class = "row">
                                <div class = "cell">Quiz 3</div>
                                <div class = "cell">4%</div>
                                <div class = "cell">April. 2nd (during lecture)</div>
                            </div>
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
                    <div class = "note">
                        There is a 3hrs final exam. The final exam is comprehensive, and you must obtain a mark of at least 40% to pass the course; otherwise, a grade of no higher than 47% will be assigned.
                    </div>
                </div>
                <!-- Announcements Panel -->
                <div id = "announcements" class="shadow inContentBox">
                    <h3>Announcements</h3>
                    <div class = "announce windowGn">
                        <span class="exit">&times;</span> 
                        <h4>Reminders About Assingment 2</h4>
                        <h5>Posted: Wednesday, March 7, 2018 11:52:19 AM EST </h5>
                        <p>
                            1. You cannot use 3rd party CSS framework. <br>
                            2. You cannot use 3rd party JavaScript framework such as  JQuery etc. <br>
                            4. You can use the content (such as pdf, instructor name, TA name, etc. etc.) from either Anna's website or our current website. <br>
                            5. Each user story can be 2-3 sentences. Concentrate on how the user will interact with your website. Also to think about here is the kinds of user (instructor or admin or student). Your user stories and mock diagram must be well considered and thorough. In your mock diagram, please do not use a screenshot of the actual web page. This is incorrect. The mock diagram happens first. At this point, you have a rough idea of how the webpage should work and how the user will interact with it. <br>
                            6. Here are some example of user stories, that I encourage you to read and get familiar with: https://www.mountaingoatsoftware.com/agile/user-stories <br>
                            7. Make sure to test and run your webpage on Google Chrome. If your webpage depends on some images and other resources, make sure to have them placed appropriately in the directory that you submit to us. Please see the assignment handout for this. 
                            
                        </p>
                    </div>
                    <div class = "announce windowYl">
                        <span class="exit">&times;</span>
                        <h4>Extra TA Office Hours</h4>
                        <h5>Posted: Monday, March 5, 2018 11:19:28 PM EST </h5>
                        <p>
                            Here are some office hours by TA for this week:<br>
                            Nagarjun - Tuesday 9am - 12pm @ IC404 <br>
                            Zhongyang - Friday 1pm - 4pm @ IC404<br>
                            Syeda - Thursday 11am-12pm &amp; Friday 3pm to 5pm @ IC404 <br>
                        </p>
                    </div>
                    <div class = "announce windowRd">
                        <span class="exit">&times;</span> 
                        <h4>Office Hours Cancelled!</h4>
                        <h5>Posted: Friday, March 2, 2018 1:29:53 AM EST </h5>
                        <p>
                            Office hours on 2nd March Are Cancelled. I am sorry about this, but I have had some bad back ache tonight. I will see you guys again on Monday. <br>
                            -Abbas
                        </p>
                    </div>
                </div>
                
                <!-- Calendar -->
                <iframe src="https://calendar.google.com/calendar/embed?src=2nu2edvea7ri3t5cgbcv21cibc%40group.calendar.google.com&amp;ctz=America%2FToronto" width="800" height="600" frameborder="0" scrolling="no" class="inContentBox"></iframe>
                
                <!-- Course Team -->
                <div id="courseTeam" class="inContentBox shadow">
                    <h3>Course Team</h3>
                    <div class="flex_wrapper">
                        <div class="card shadow">
                            <img src="img/default.jpg"/>
                            <div class="teamInfo">
                                <p>
                                    ta's name <br/>
                                    ta's email
                                </p>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img src="img/default.jpg"/>
                            <div class="teamInfo">
                                <p>
                                    ta's name <br/>
                                    ta's email
                                </p>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img src="img/default.jpg"/>
                            <div class="teamInfo">
                                <p>
                                    ta's name <br/>
                                    ta's email
                                </p>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img src="img/default.jpg"/>
                            <div class="teamInfo">
                                <p>
                                    ta's name <br/>
                                    ta's email
                                </p>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img src="img/default.jpg"/>
                            <div class="teamInfo">
                                <p>
                                    ta's name <br/>
                                    ta's email
                                </p>
                            </div>
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
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>
