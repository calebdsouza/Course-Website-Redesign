<?php
   include("config.php");
   session_start();
   define('TABLE', 'login'); 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     // echo htmlspecialchars($_SERVER['PHP_SELF']);
      // username and password sent from form 
      // Check if login is not null, and username and password is entered
     // if (!empty($_POST['username'])
       //                         && !empty($_POST['password'])) {
      	$myusername = mysqli_real_escape_string($db,$_POST['username']);
      	$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        //echo $myusername;
        //echo $mypassword;
     	$sql = "SELECT id FROM  ".TABLE." WHERE utorid = '$myusername' and password = '$mypassword'";
	//echo $sql;      
	$result = mysqli_query($db,$sql);
	//echo $result."end";
      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	$count = mysqli_num_rows($result);
      
      	// If result matched $myusername and $mypassword, table row must be 1 row
		
      	if($count == 1) {
	        $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['login_user'] = $myusername;
          header("Location: ../index.php");
	    echo "SIGNED IN :)";
        }else {
          header("Location: login.html");
          $error = "Your Utorid or Password is invalid";
	    echo $error;
        }
     
}
?>
