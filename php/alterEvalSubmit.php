<?php
    include("config.php");
    $msg = "";
    session_start();

    $_SESSION['error'] = $msg;
    $isInsertRow = false;

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["action"])) {
        $table = "Marks";
        if ($_POST["action"] == "delete") {
            if (isset($_POST["evaluation"])) {
                include("delete.php");
                $columnName = $_POST["evaluation"];
                delete($table, $columnName, true, NULL);
            }

        } else if ($_POST["action"] == "add") {
            if (isset($_POST["newEvalName"])) {
                // Inserting column to table
                $sql = "ALTER TABLE ".$table." ADD ".$columnName." VARCHAR(20)";
                if ($result = mysqli_query($db, $sql)) {
                    $msg = "Action was successfully added";
                } else { // Send SQL error message
                    $msg = "Error: ".$sql."<br>".$db->error;
                }
            }
        } else {
            $msg = "Usage Error: No action was selected";
        }   
    } else {
        $msg = "Usage Error: No action was selected";
    }
    
    $_SESSION['error'] = $msg;
    header("Location: ../marks.php");
?>
