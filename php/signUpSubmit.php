<?php
    include("config.php");
    $msg = "";
    session_start();
    
    // Check if the user entered all the information required for remark
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["accountType"])
        && isset($_POST["first"]) && isset($_POST["last"]) &&
        isset($_POST["utorid"]) && isset($_POST["password"]) &&
        isset($_POST["email"]) && isset($_POST["code"])) {

        // Get infomation that was POSTed
        $accountType = mysqli_real_escape_string($db, $_POST['accountType']);
        $first = mysqli_real_escape_string($db, $_POST['first']);
        $last = mysqli_real_escape_string($db, $_POST['last']);
        $utorid = myysqli_real_escap_string($db, $_POST['utorid']);
        $password = mysqli_real_escap_string($db, $_POST['password']);
        $email = mysqli_real_escap_string($db, $_POST['email']);
        $code = mysqli_real_escap_string($db, $_POST['code']);
        
        $table = "Account Code";
        $sql = 
        // Create sql insert statment
        $table = "Remarks";
        $sql = "INSERT INTO ".$table.
                " (UTORid, Evaluation, Reason, TAid) VALUES ('".
                $_SESSION['UTORid']."', '".$evaluation."', '".$remarkReason.
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
    header("Location: ../index.php");
    
    // Free result set
    mysqli_free_result($result);
    $db->close();
?>
