<?php
    include '../pages/dbcontroller.php';
    if($_SERVER["REQUEST_METHOD"] === "GET")
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $result = $conn -> prepare("select * from experiences where id = ?");
            $result -> bind_param("i",$id);
            $result -> execute();
            $res = $result -> get_result();
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc(); // fetch the row
                // print out the columns
                echo $row["id"]."?";
                echo $row["job_title"]."?";
                echo $row["company"]."?";
                echo $row["start_date"]."?" ;
                echo $row["end_date"]."?";
                echo $row["company_location"]."?";
                echo $row["description"];
            } else {
                echo "No results found.";
            }
        }
        else if(isset($_GET['delete_id']))
        {
            $id = $_GET['delete_id'];
            $result = $conn -> prepare("delete from education experiences id = ?");
            $result -> bind_param('i',$id);
            $result -> execute();
            echo "successfully delete";
        }
    }
    else if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $jobTitle = $_POST["exp_job"];
        $company = $_POST["exp_company"];
        $from = $_POST["exp_from"];
        $to = $_POST["exp_to"];
        $location = $_POST["exp_location"];
        $description = $_POST["exp_des"];
        $cv_id = 2;

        $stmt = $conn->prepare("INSERT INTO experiences(job_title, company, start_date, end_date, company_location, description, cv_id) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssi", $jobTitle, $company, $from, $to, $location, $description, $cv_id);
        $stmt->execute();
    }

?>
