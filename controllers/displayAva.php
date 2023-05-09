<?php
    include '../pages/dbcontroller.php';

    if(isset($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
        $stmt = $conn -> prepare("select avatar from cvs where id_user = ?");
        $stmt -> bind_param("i",$user_id);
        $stmt -> execute();
        $result = $stmt -> get_result();

        $row = $result -> fetch_array();
        header("Content-type: image/jpeg");
        echo $row['avatar'];
    }

?>