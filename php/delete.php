<?php
    
    $msg = "";
    session_start();

    function delete($table, $columnName, $column = false, $ID = NULL) {
        include("config.php");
        if ($column === false) {
            // Deleting row from table
            $sql = "DELETE FROM ".$table." WHERE ".$columnName." = ".$ID;
        } else if ($column === true) {
            // Deleting column from table
            $sql = "ALTER TABLE ".$table." DROP ".$value;
        }
        echo $sql;
        $result = mysqli_query($db, $sql);
        if ($result == True) {
            $msg = "Was successfully delete";
        } else { // Send SQL error message
            $msg = "Error: ".$sql."<br>". $db->error;
        }
        echo $msg;
        $_SESSION['error'] = $msg;
    }
     echo "START";
    $_SESSION['error'] = $msg;
    $isDelRow = false;
    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["isDelRow"])
     && isset($_POST["delColName"]) && isset($_POST["delTable"]) && isset($_POST["delRowId"]) && isset($_POST["link"])) {
        echo "VALUES SETS";
        if (isset($_POST["isDelRow"])) {
            if ($_POST["isDelRow"] == "true") {
                $isDelRow = True;
                echo "is true\n";
            }
        }
        echo "ABOUT TO RUN DELETE()\n";
        delete($_POST["delTable"], $_POST["delColName"], $isDelRow, $_POST["delRowId"]);
  
        header("Location: ".$_POST["link"]);
    }
?>
