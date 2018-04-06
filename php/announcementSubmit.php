<?php
    include("config.php");
    $msg = "";
    session_start();

    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["new_title"])
        && isset($_POST["announcement_content"])) {

        // Get infomation that was POSTed
        $title = mysqli_real_escape_string($db, $_POST['new_title']);
        $content = mysqli_real_escape_string($db, $_POST['announcement_content']);

        // Create sql insert statment
        $table = "Announcements";
        $sql = "INSERT INTO ".$table.
                " (title, content, posted) VALUES (".$title.", '".$content."', curdate())";

        // Insert and check if given POST information was added to the db
        if ($db->query($sql) === TRUE) {
            $msg = "Feedback was successfully submitted";
        } else { // Send SQL error message
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }
    } else { // Send usage error message
        $msg = "Error: No field can be left blank";
    }

    $_SESSION['error'] = $msg;
    header("Location: ../enterAnnouncements.php");
    
?>