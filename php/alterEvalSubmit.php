<?php
    include("config.php");
    $msg = "";
    session_start();

    $_SESSION['error'] = $msg;
    $isInsertRow = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $table = "Evaluations";
        if (isset($_POST["isDeletingEval"])) {
            if (isset($_POST["evaluation"])) {
                include("delete.php");
                $columnName = $_POST["evaluation"];
                delete($table, $columnName, true, NULL);
            }

        } else if (isset($_POST["isAddingEval"])) {
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

        header("Location: ../marks.php");
    }
?>
