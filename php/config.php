<?php
   if (!defined('DB_SERVER', 'mathlab.utsc.utoronto.ca')) define('DB_SERVER', 'mathlab.utsc.utoronto.ca');
   if (!defined('DB_USERNAME', 'sunyuan8')) define('DB_USERNAME', 'sunyuan8');
   if (!defined('DB_PASSWORD', '1243')) define('DB_PASSWORD', '1243');
   if (!defined('DB_DATABASE', 'cscb20w18_sunyuan8')) define('DB_DATABASE', 'cscb20w18_sunyuan8');
   
   // Create connection to the database
   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

   // Check connection to the database
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
