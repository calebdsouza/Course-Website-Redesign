<?php
    include("config.php");
    $msg = "";
    session_start();

    function delete($table, $columnName, $column = false, $ID = NULL) {
        if ($column === false) {
            // Deleting row from table
            $sql = "DELETE FROM ".$table." WHERE ".$ID." = ".$columName;
        } else if ($column === true) {
            // Deleting column from table
            $sql = "ALTER TABLE ".$table." DROP ".$value;
        }

        $result = $db->query($sql);
        if ($result == True) {
            $msg = "Was successfully delete";
        } else { // Send SQL error message
            $msg = "Error: " . $sql . "<br>" . $db->error;
        }

        $_SESSION['error'] = $msg;
        header("Location: ../enterMarks.php");
    }

    $_SESSION['error'] = $msg;
    header("Location: ../enterMarks.php");
?>
