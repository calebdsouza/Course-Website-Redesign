<?php
    include("config.php");
    $msg = "";

    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["evaluation"])
        && isset($_POST["remarkReason"]) && isset($_POST["ta"])) {

        // Get infomation that was POSTed
        $evaluation = mysqli_real_escape_string($db, $_POST['evaluation']);
        $remarkReason = mysqli_real_escape_string($db, $_POST['remarkReason']);
        $ta = mysqli_real_escape_string($db, $_POST['ta']);

        // Get the TA id who is required to do the remark
        $table = "TA";
        $ta_name = explode(" ", $ta);
        $sql = "SELECT ID, UTORid FROM ".$table." WHERE First = ".$ta_name[0]." AND Last = ".$ta_name[1];
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $ta_id = $row["UTORid"];

        // Create sql insert statment
        $table = "Remarks";
        $sql = "INSERT INTO ".$table.
                " (UTORid, Evaluation, Reason, TAid) VALUES ('".
                $_SESSION['UTORid']."', '".$evaluation."', ".$remarkReason.
                "', '".$ta_id."')";

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