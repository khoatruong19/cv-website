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
            $result = $conn -> prepare("delete from experiences where id = ?");
            $result -> bind_param('i',$id);
            $result -> execute();
            echo "successfully delete";
        }
    }
    else if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $id = $_POST["id"];
        $jobTitle = $_POST["exp_job"];
        $company = $_POST["exp_company"];
        $from = $_POST["exp_from"];
        $to = $_POST["exp_to"];
        $location = $_POST["exp_location"];
        $description = $_POST["exp_des"];
        $user_id = $stmt -> bind_param("i",$_SESSION["userId"]);

        $exists = $conn->prepare("SELECT COUNT(*) FROM experiences WHERE " .
        "job_title=? and company=? and start_date=? and " .
        "end_date=? and company_location= ? and description=? and user_id=?");

        $exists -> bind_param("ssssssi",$jobTitle, $company, $from, $to, $location, $description, $user_id);
        $exists -> execute();
        $res = $exists -> get_result();
        $Row = $res -> fetch_array();
        if($Row[0] > 0) return;


        $result = $conn -> prepare("select * from experiences where id = ?");
        $result -> bind_param("i",$id);
        $result -> execute();
        $res = $result -> get_result();
        if($res -> num_rows > 0)
        {
            $update = $conn -> prepare("update experiences set job_title=?, company=?, start_date=?, " .
                                        "end_date=?, company_location= ?, description=?,user_id=? where id = ?");
            $update -> bind_param("ssssssii",$jobTitle, $company, $from, $to, $location, $description, $user_id, $id);
            $update -> execute();
            return;
        }

        $stmt = $conn->prepare("INSERT INTO experiences(job_title, company, start_date, end_date, company_location, description, user_id) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssi", $jobTitle, $company, $from, $to, $location, $description, $user_id);
        $stmt->execute();
    }

?>
