<?php
    include("config.php");
    $msg = "";
    session_start();
    
    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["feedback_instructor"])
        && isset($_POST["feedback_q1"]) && isset($_POST["feedback_q2"])
        && isset($_POST["feedback_q3"]) && isset($_POST["feedback_q4"])) {

        // Get infomation that was POSTed
        $q1 = mysqli_real_escape_string($db, $_POST['feedback_q1']);
        $q2= mysqli_real_escape_string($db, $_POST['feedback_q2']);
        $q3= mysqli_real_escape_string($db, $_POST['feedback_q3']);
        $q4= mysqli_real_escape_string($db, $_POST['feedback_q4']);
        $instructor_id = mysqli_real_escape_string($db, $_POST['feedback_instructor']);

        // Create sql insert statment
        $table = "Feedback";
        $sql = "INSERT INTO ".$table.
                " (instructorID, q1, q2, q3, q4) VALUES (".
                $instructor_id.", '".$q1."', ".$q2.
                "', '".$q3."', '".$q4."')";
        echo "SQL QUERY OK!";

        // Insert and check if given POST information was added to the db
        if ($db->query($sql) === TRUE) {
            $msg = "Feedback was successfully submitted";
            echo "SUBMITTED!";
        } else { // Send SQL error message
            $msg = "Error: " . $sql . "<br>" . $db->error;
            echo "ERROR Somthing went wrong!";
        }
    } else { // Send usage error message
        $msg = "Error: No field can be left blank";
    }

    $_SESSION['error'] = $msg;
    header("Location: ../feedback.php");
    
?>