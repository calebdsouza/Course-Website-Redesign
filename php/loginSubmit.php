<?php
   include("config.php");
   session_start();
   $table = "Login";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']); 

    $sql = "SELECT ID, Type FROM  ".TABLE." WHERE UTORid = '$username' and password = '$password'";      
	  $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
    $count = mysqli_num_rows($result);
    
    $error = "";
    // If result matched $username and $password, table row must be 1 row
    if($count == 1) {
      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      if ($row['Type'] == 'S') {
        $table = "Student";
        $sql = "SELECT FIRST, LAST FROM  ".TABLE." WHERE ID = ".$row["ID"];
        $result = mysqli_query($db,$sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_name'] = $row["First"]." ".$row["LAST"];
      }
      header("Location: ../index.php");
    }else {
      $_SESSION['valid'] = false;
      $_SESSION['error'] = "Your Utorid or Password is invalid";
      header("Location: ../login.php");
    }
     
  } 
?>
