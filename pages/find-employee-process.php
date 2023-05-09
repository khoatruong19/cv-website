<?php
    include "dbcontroller.php";
    function formatSkills($skill){
        return $skill->value;
    }

    function buildEqualQuery($field, $fieldValue, $defaultValue, $first = false){
        if($fieldValue === $defaultValue) return "";
        if($first) return " where A.$field = '$fieldValue'";
        return " and A.$field = '$fieldValue'";
    }
    function buildLikeQuery($field, $fieldValue, $defaultValue, $first = false){
        if($fieldValue === $defaultValue) return "";
        if($first) return " where A.$field like '%$fieldValue%'";
        return " and A.$field like '%$fieldValue%'";
    }
    if(isset($_POST["position"]) || isset($_POST["level"]) || isset($_POST["experience"]) || isset($_POST["skills"]) || isset($_POST["location"])){

    $position = $_POST["position"] ?? "all";
    $level = $_POST["level"] ?? "all";
    $experience = $_POST["experience"] ?? "all";
    $skills = $_POST["skills"] ?? "";
    $location = $_POST["location"] ?? "";

    if($position === "") $position = "all";

    if(strlen($skills) > 0){
        $skills = json_decode($skills);
        $skills = array_map('formatSkills', $skills);
        $skills = join(";",$skills);
    }

    $sql = "SELECT A.id, A.job_title , A.first_name, A.last_name, A.address, A.avatar, B.start_date from cvs as A";
    $sql .= " LEFT OUTER JOIN (SELECT user_id, min(start_date) AS start_date FROM experiences GROUP BY user_id) as B ON A.id_user = B.user_id";
    $sql .= buildEqualQuery("job_title", $position, "all", true);
    $sql .= buildEqualQuery("level", $level, "all", !str_contains($sql, "where"));
    $sql .= buildLikeQuery("skills", $skills, "",!str_contains($sql, "where"));
    $sql .= buildLikeQuery("address", $location, "",!str_contains($sql, "where"));
    $sql .= buildLikeQuery("is_published", 1, "",!str_contains($sql, "where"));


    if($experience !== "all"){
        $experience = explode("-",$experience);
    }

    $cvs = array();

    $page = (int)$_POST["page"] ?? 1;
    $offset =  ($page-1) * 3;

    $limitSql = $sql;
    $limitSql .=" limit 3 offset $offset";

    $withExperienceCount = 0;

    try{
        $result = mysqli_query($conn, $limitSql);
        $totalResult = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if(is_array($experience)){
                    if(!$row["start_date"] && $experience[0] === '0'){
                        array_push($cvs, $row);
                        $withExperienceCount += 1;
                    }
                    if($row["start_date"]){
                        $date1 = new DateTime($row["start_date"]);
                        $date2 = new DateTime();
                        $interval = $date1->diff($date2);
                        if($interval->y >= (int)$experience[0] &&  (float)"$interval->y.$interval->m" <= (int)$experience[1]){
                            array_push($cvs, $row);
                            $withExperienceCount += 1;
                        }
                    }
                }
                else{
                    array_push($cvs, $row);
                }
            }

            $totalCvs = is_array($experience) ? $withExperienceCount : mysqli_num_rows($totalResult);
            echo json_encode(array('total' => $totalCvs, 'cvs' => $cvs));

        } else {
            echo "No cvs found";
        }
      }
      catch(Exception $e){
        echo $e;
      }

    }
?>