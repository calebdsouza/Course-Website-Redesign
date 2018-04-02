<?php
   include("config.php");
   session_start();
   $table = "Login";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']); 

    $sql = "SELECT ID, UTORid, Type FROM  ".$table." WHERE UTORid = '$username' and password = '$password'";      
	  $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
    $count = mysqli_num_rows($result);
    
    $error = "";

    // If result matched $username and $password, table row must be 1 row
    if($count == 1) {
      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['accountType'] = $row['Type'];

      // Check the account type of the user which has logged in 
      if ($row['Type'] == 'S') { // Is a Student
        $table = "Student";
        $sql = "SELECT UTORid, FIRST, LAST FROM  ".$table." WHERE ID = ".$row["ID"];
        $result = mysqli_query($db, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['UTORid'] = $row["UTORid"];
        $_SESSION['user_name'] = $row["FIRST"]." ".$row["LAST"];
      } else if ($row['Type'] == 'T') { // Is a Teaching Assitant
        $table = "T.A";
        $sql = "SELECT FIRST, LAST FROM  ".$table." WHERE ID = ".$row["ID"];
        $result = mysqli_query($db, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_name'] = $row["First"]." ".$row["LAST"];
        $_SESSION['UTORid'] = $row["UTORid"];
      } else if ($row['Type'] == 'I') { // Is a Instructor
        $table = "Instructors";
        $sql = "SELECT ID, First, Last FROM ".$table." WHERE ID = ".$row["ID"];
        $result = mysqli_query($db, $sql);
        echo "ID".$row["ID"]; 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "RE: ".$row;
        $_SESSION['user_name'] = $row["First"]." ".$row["Last"];
        $_SESSION['instructorID'] = $row["ID"];
      }

      header("Location: ../index.php");
      $_SESSION['error'] = "";
    } else {
      $_SESSION['valid'] = false;
      $_SESSION['error'] = "Your Utorid or Password is invalid";
      header("Location: ../login.php");
    }
     
  } 
?>
