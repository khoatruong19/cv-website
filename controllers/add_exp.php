<?php
    include '../pages/dbcontroller.php';
    if($_SERVER["REQUEST_METHOD"] === "POST")
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

        $dom = new DOMDocument();
        $root = $dom -> createElement("div");
        $root -> setAttribute("class", "row");
        $dom -> appendChild($root);

        $col1 = $dom -> createElement("div");
        $col1 -> setAttribute("class", "col-1");
        $i_tag = $dom -> createElement("i");
        $i_tag -> setAttribute("class", "far fa-circle-check fa-2x");
        $i_tag -> setAttribute("style", "color: rgb(76, 160, 230)");
        $col1 -> appendChild($i_tag);
        $root -> appendChild($col1);

        $col9 = $dom -> createElement("div");
        $col9 -> setAttribute("class", "col-9");
        $h5 = $dom -> createElement("h5");
        $h5 -> setAttribute("class", "mt-0 mb-1");
        $h5 -> textContent = $jobTitle;
        $p = $dom -> createElement("p");
        $p -> setAttribute("class", "text-secondary fw-light custom_fs");
        $p -> textContent = "$from to $to";
        $col9 -> appendChild($h5);
        $col9 -> appendChild($p);

        $root -> appendChild($col9);
        $hr = $dom -> createElement("hr");
        $hr -> setAttribute("style", "border-top: 1px solid rgb(233,231,231);");
        $root -> appendChild($hr);

        echo ($dom -> saveHTML());
    }

?>
