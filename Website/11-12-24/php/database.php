<?php  

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "123";
    $db_name = "arimarket";
    $conn = "";

    try {
        $conn = mysqli_connect($db_server,
                               $db_user,
                               $db_pass,
                               $db_name);
    }
    

    catch(mysqli_sql_exception) {
        echo"Could not connect.";

    } 
    
    if ($conn) {
        echo"You are connected!";
    }

?>