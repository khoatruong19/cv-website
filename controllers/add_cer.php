<?php
    session_start();
    include '../pages/dbcontroller.php';
    if($_SERVER["REQUEST_METHOD"] === "GET")
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $result = $conn -> prepare("select * from certificates where id = ?");
            $result -> bind_param("i",$id);
            $result -> execute();
            $res = $result -> get_result();
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc(); // fetch the row
                // print out the columns
                echo $row["id"]."?";
                echo $row["certificate_name"]."?";
                echo $row["issue_organization"]."?";
                echo $row["start_date"]."?" ;
                echo $row["end_date"]."?";
                echo  $row["credential_url"]."?";
                echo $row["description"];
            } else {
                echo "No results found.";
            }
        }
        else if(isset($_GET['delete_id']))
        {
            $id = $_GET['delete_id'];
            $result = $conn -> prepare("delete from certificates where id = ?");
            $result -> bind_param('i',$id);
            $result -> execute();
            echo "successfully delete";
        }
    }
    else if($_SERVER["REQUEST_METHOD"] === "POST")
    {

        $id = $_POST["id"];
        $name = $_POST["cer_name"];
        $organization = $_POST["cer_organization"];
        $from = $_POST["cer_from"];
        $to = $_POST["cer_to"];
        $url = $_POST["cer_url"];
        $description = $_POST["cer_des"];
        $user_id = $_SESSION["userId"];

        $exists = $conn->prepare("SELECT COUNT(*) FROM certificates WHERE " .
        "certificate_name=? and issue_organization=? and start_date=? and " .
        "end_date=? and credential_url= ? and description=? and user_id=?");

        $exists -> bind_param("ssssssi",$name, $organization, $from, $to, $url, $description, $user_id);
        $exists -> execute();
        $res = $exists -> get_result();
        $Row = $res -> fetch_array();
        if($Row[0] > 0) return;


        $result = $conn -> prepare("select * from certificates where id = ?");
        $result -> bind_param("i",$id);
        $result -> execute();
        $res = $result -> get_result();
        if($res -> num_rows > 0)
        {
            $update = $conn -> prepare("update certificates set certificate_name=?, issue_organization=?, start_date=?, " .
                                        "end_date=?, credential_url= ?, description=?,user_id=? where id = ?");
            $update -> bind_param("ssssssii",$name, $organization, $from, $to, $url, $description, $user_id, $id);
            $update -> execute();

            return;
        }


        $stmt = $conn->prepare("INSERT INTO certificates(certificate_name, issue_organization, start_date, end_date, credential_url, description, user_id) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssi", $name, $organization, $from, $to, $url, $description, $user_id);
        $stmt->execute();
    }

?>
