<?php 
    require __DIR__ . '/components/header.php';  
    require __DIR__ . '/dbcontroller.php'; 
?> 

<link rel="stylesheet" href="../css/view-employee.css">
<body>

<?php 
    include "dbcontroller.php";
    // $id = $_SESSION['userId'];
    $id = $_GET["id"];
    $sql = "SELECT * FROM cvs WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    // echo $result;
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $avatar = $row['avatar'];
    $bio = $row['bio'];
    $job_title = $row['job_title'];
    $level = $row['level'];
    $skills = $row['skills'];
    $id_user = $row['id_user'];
    
?>
<div id="dom_skills" style="display: none">
    <?php 
        echo htmlspecialchars($skills);
    ?>
</div>
<script>
    let dom_skills = document.getElementById("dom_skills");
    let skills = dom_skills.textContent;
    let skills_array = skills.split(";");
    let skills_string = skills_array.join(", ");
</script>

<div class="container" style="width: 70vw">
    <div class="row short-des">
        <div class="col-sm-4 user-image">
            <img src="../controllers/displayAva.php?user_id=<?php echo $id_user; ?>" alt="" class="w-100 m-0">
        </div>
        <div class="col-sm-8 pl-6">
            <h1 class="username row">
            <div class="col fs-1 fw-bold mb-3"><span><?php echo "$first_name"?></span><span><?php echo " $last_name"?></span></div>
            </h1>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Short description</span><br>
                    <span class="fw-light p"><?php echo "$bio"?></span>
                </div>
            </h1>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Currently</span><br>
                    <span class="fw-light p"><?php echo "$job_title"?></span>
                </div>
                <div class="col">
                    <span class="fw-bold h5">Address</span><br>
                    <span class="fw-light p"><?php echo "$address"?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Skills</span><br>
                    <span class="fw-light p" id="skills"></span>
                    <script>
                        document.getElementById("skills").innerHTML = skills_string;
                    </script>
                </div>
                <div class="col">
                    <span class="fw-bold h5">Level</span><br>
                    <span class="fw-light p"><?php echo "$level"?></span>
                </div>
            </div>
            <div class="contacts row">
                <div class="col">
                    <span class="fw-bold h5">Email</span><br>
                    <span class="fw-light p"><?php echo "$email"?></span>
                </div>
                <div class="col">
                    <span class="fw-bold h5">Phonenumber</span><br>
                    <span class="fw-light p"><?php echo "$phone"?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row fields">
    <div class="col relative">
        <div class="row category experience">
            <h2>Experience</h2>
            <?php 
                $sql = "SELECT * FROM experiences WHERE user_id = $id_user";
                $result = mysqli_query($conn, $sql);
                
                $num_row = mysqli_num_rows($result);
                // echo "$num_row";

                while ($rows = mysqli_fetch_assoc($result)){
                    $job_title = $rows['job_title'];
                    $start_date = $rows['start_date'];
                    $end_date = $rows['end_date'];
                    $comp_name = $rows['company'];
                    $comp_loc = $rows['company_location'];
                    $desp = $rows['description'];
                    echo "
                    <div class='category-item'>
                        <div class='brief mt-6'>
                            <div class='title-2 fs-5 fw-bold'>$job_title</div>
                            <span class='fw-light'><span>(Start: $start_date/</span><span>End: $end_date)</span></span>
                        </div>
                        <span class='fw-bold fst-italic mb-6'>$comp_name/$comp_loc</span>
                        <p class='fw-light mb-6'>$desp</p>
                    </div>
                    ";
                }
            ?>
        </div>
        <div class="divider_line"></div>
        <div class="row category education">
            <h2>Education</h2>
            <?php 
                $sql = "SELECT * FROM education WHERE user_id = $id_user";
                $result = mysqli_query($conn, $sql);
                
                $num_row = mysqli_num_rows($result);
                // echo "$num_row";

                while ($rows = mysqli_fetch_assoc($result)){
                    $department = $rows['department'];
                    $start_date = $rows['start_date'];
                    $end_date = $rows['end_date'];
                    $faculty = $rows['faculty'];
                    $uni_loc = $rows['location'];
                    $desp = $rows['description'];
                    echo "
                    <div class='category-item'>
                        <div class='brief mt-6'>
                            <div class='title-2 fs-5 fw-bold'>$department</div>
                            <span class='fw-light'><span>(Start: $start_date/</span><span>End: $end_date)</span></span>
                        </div>
                        <span class='fw-bold fst-italic mb-6'>$faculty/$uni_loc</span>
                        <p class='fw-light mb-6'>$desp</p>
                    </div>
                    ";
                }
            ?>
        </div>
        <div class="divider_line"></div>
        <div class="row category certificate">
            <h2>Certificate</h2>
            <?php 
                $sql = "SELECT * FROM certificates WHERE user_id = $id_user";
                $result = mysqli_query($conn, $sql);
                
                $num_row = mysqli_num_rows($result);
                // echo "$num_row";

                while ($rows = mysqli_fetch_assoc($result)){
                    $certificate_name = $rows['certificate_name'];
                    $start_date = $rows['start_date'];
                    $end_date = $rows['end_date'];
                    $issue_organization = $rows['issue_organization'];
                    $desp = $rows['description'];
                    echo "
                    <div class='category-item'>
                        <div class='brief mt-6'>
                            <div class='title-2 fs-5 fw-bold'>$certificate_name</div>
                            <span class='fw-light'><span>(Start: $start_date/</span><span>End: $end_date)</span></span>
                        </div>
                        <span class='fw-bold fst-italic mb-6'>$issue_organization</span>
                        <p class='fw-light mb-6'>$desp</p>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php require __DIR__ . '/components/footer.php';  ?>