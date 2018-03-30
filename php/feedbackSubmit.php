<?php
    include("config.php");
    $msg = "";

    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["feedback_instructor"])
        && isset($_POST["feedback_q1"]) && isset($_POST["feedback_q2"])
        && isset($_POST["feedback_q3"]) && isset($_POST["feedback_q4"])) {

        // Get infomation that was POSTed
        $q1 = mysqli_real_escape_string($db, $_POST['feedback_q1']);
        $q2= mysqli_real_escape_string($db, $_POST['feedback_q2']);
        $q3= mysqli_real_escape_string($db, $_POST['feedback_q3']);
        $q4= mysqli_real_escape_string($db, $_POST['feedback_q4']);
        $instructor = $_POST['feedback_instructor'];

        // Get the TA id who is required to do the remark
        $table = "Instructor";
        $ta_name = explode(" ", $instructor);
        $sql = "SELECT ID FROM ".$table." WHERE First = ".$instructor[0].
                " AND Last = ".$instructor[1];
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $instructor_id = $row["ID"];

        // Create sql insert statment
        $table = "Feedback";
        $sql = "INSERT INTO ".$table.
                " (instructorID, q1, q2, q3, q4) VALUES ('".
                $instructor_id."', '".$q1."', ".$q2.
                "', '".$q3."', '".$q4."')";

        // Insert and check if given POST information was added to the db
        if ($db->query($sql) === TRUE) {
            $msg = "Remark was successfully submitted";
        } else { // Send SQL error message
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }
    } else { // Send usage error message
        $msg = "Error: No field can be left blank";
    }

    $_SESSION['error'] = $msg;
    
?>