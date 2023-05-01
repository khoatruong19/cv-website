<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cv_web";
    $conn = "";

    try{
        $conn = mysqli_connect($servername,$username, $password, $dbname);
    }
    catch(mysqli_sql_exception){
        echo "Fail to connect to database!";
    }
?>