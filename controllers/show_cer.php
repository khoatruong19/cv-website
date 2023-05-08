<?php

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        include '../pages/dbcontroller.php';
        $stmt = $conn -> prepare("select * from certificates");
        $stmt -> execute();
        $result = $stmt -> get_result();
        $dom = new DOMDocument();
        while($res = $result -> fetch_assoc())
        {
            $root = $dom -> createElement("div");
            $root -> setAttribute("class", "row");
            $root -> setAttribute("type", "button");
            $root -> setAttribute("data-mdb-toggle","modal");
            $root -> setAttribute("data-mdb-target", "#cer_form_modal");
            $root -> setAttribute("onclick","updateCer(this.id)");
            $root -> setAttribute("id",$res["id"]);
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
            $h5 -> textContent = $res["certificate_name"];
            $p = $dom -> createElement("p");
            $p -> setAttribute("class", "text-secondary fw-light custom_fs");
            $p->textContent = "{$res["start_date"]} to {$res["end_date"]}";
            $col9 -> appendChild($h5);
            $col9 -> appendChild($p);

            $root -> appendChild($col9);
            $hr = $dom -> createElement("hr");
            $hr -> setAttribute("style", "border-top: 1px solid rgb(233,231,231);");
            $root -> appendChild($hr);

            $dom -> appendChild($root);
        }
        echo($dom -> saveHTML());
    }

?>