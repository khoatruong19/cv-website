<?php
    include '../pages/dbcontroller.php';
    if($_SERVER["REQUEST_METHOD"] === "GET")
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $result = $conn -> prepare("select * from education where id = ?");
            $result -> bind_param("i",$id);
            $result -> execute();
            $res = $result -> get_result();
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc(); // fetch the row
                // print out the columns
                echo $row["id"]."?";
                echo $row["department"]."?";
                echo $row["faculty"]."?";
                echo $row["start_date"]."?" ;
                echo $row["end_date"]."?";
                echo  $row["location"]."?";
                echo $row["description"];
            } else {
                echo "No results found.";
            }
        }
        else if(isset($_GET['delete_id']))
        {
            $id = $_GET['delete_id'];
            $result = $conn -> prepare("delete from education where id = ?");
            $result -> bind_param('i',$id);
            $result -> execute();
            echo "successfully delete";
        }
    }
    else if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $department = $_POST["edu_department"];
        $faculty = $_POST["edu_faculty"];
        $from = $_POST["edu_from"];
        $to = $_POST["edu_to"];
        $location = $_POST["edu_location"];
        $description = $_POST["edu_des"];
        $cv_id = 2;

        $stmt = $conn->prepare("INSERT INTO education(department, faculty, start_date, end_date, location, description, cv_id) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssi", $department, $faculty, $from, $to, $location, $description, $cv_id);
        $stmt->execute();
    }

?>
