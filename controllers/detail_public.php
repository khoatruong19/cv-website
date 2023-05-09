<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        include '../pages/dbcontroller.php';
        mysqli_query($conn, "UPDATE cvs SET is_published = 1 WHERE id_user = $id_user");
    }
?>