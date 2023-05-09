<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        include '../pages/dbcontroller.php';
        mysqli_query($conn, "UPDATE cvs SET is_published = 0 WHERE id_user = $userId");
    }
?>