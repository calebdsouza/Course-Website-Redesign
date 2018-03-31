<?php
    include("config.php");
    $msg = "";
    session_start();
    
    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["utorid"])
        && isset($_POST["evaluation"]) && isset($_POST["grade"])) {

        // Get infomation that was POSTed
        $evaluation = mysqli_real_escape_string($db, $_POST['evaluation']);
        $utorid = mysqli_real_escape_string($db, $_POST['utorid']);
        $grade = mysqli_real_escape_string($db, $_POST['grade']);
        
        // Create sql insert statment
        $table = "Marks";
        $sql = "UPDATE ".$table.
                " SET ".$evaluation." = ".$grade." WHERE UTORid = '".$utorid."'";

        // Update and check if given POST information was updatede to the db
        if ($db->query($sql) === TRUE) {
            $msg = "Mark was successfully entered";
        } else { // Send SQL error message
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }
    } else { // Send usage error message
        $msg = "Error: No field can be left blank";
    }

    $_SESSION['error'] = $msg;
    header("Location: ../enterMarks.php");
?>