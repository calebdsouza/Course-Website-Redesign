<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable = yes, width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/tree.png">
        <!--Links-->
		<link type="text/css" rel="stylesheet" href="CSS/basicIndex.css">
        <link type="text/css" rel="stylesheet" href="CSS/loginBasic.css">
        
        <title>CSCB20 | Login</title>
    </head>
    <body>


        <div id = "intorWrapper">
        
           
            <div id="siteWrapper">
            <!-- Main Page Content -->
                <div id = "header" class="shadow inContentBox">
                    <h1 >
                    CSCB20: Introduction to Databases and Web Applications
                    </h1>
                </div>
                
                <!-- Login Module -->
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
                        <form id ="loginForm" action="php/loginSubmit.php" method = "POST">
                            <p id = "loginErrorMsg">
                                <?php
                                    session_start();
                                    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                                        echo  $_SESSION['error'];
                                    }
                                ?>
                            </P>
                            <label for="username">UTORid</label><br>
                            <input type="text" placeholder = "utorid" name="username"><br>
                            <label for="password">Password</label><br>
                            <input type="password" placeholder = "password" name="password"><br><br>
                            <input id="submitBtn" type="submit" value="Login">
                            <p id = "createAccBtn">Don't have an account? <a>Sign up now!</a></p>
                        </form>
                        <div id = "homeMenuButton">
                            <img src = "img/uoft.svg"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div id = "loginFooter">
                <a href = "http://web.cs.toronto.edu/">Faculty of Computer Science at UofT</a>
                <a>Site Design by Caleb D'Souza &#38; Michael Sun</a>
            </div>
        </div>
        <!-- JavaScript -->
        <script type="text/javascript" src="JavaScript/func.js"></script>
    </body>
</html>