<?php 
    require __DIR__ . '/components/header.php';  
    require __DIR__ . '/dbcontroller.php'; 
?> 

<link rel="stylesheet" href="../css/view-employee.css">
<body>

<?php 
    include "dbcontroller.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM cvs WHERE id = 1";
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
    // $id = $_GET["id"];
    // echo $id;
?>

<div class="container" style="width: 70vw">
    <div class="row short-des">
        <div class="col-sm-4 user-image">
            <img src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="w-100 m-0">
        </div>
        <div class="col-sm-8 pl-6">
            <h1 class="username row">
            <div class="col fs-1 fw-bold mb-3"><span><?php echo "$first_name"?></span> <span><?php $array = array(1 => 'foo', 2 => 'bar'); echo "$last_name"; echo `<script>alert($array);</script>`;?></span></div>
            </h1>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Short description</span><br>
                    <span class="fw-light p"><?php echo "$bio"?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Currently</span><br>
                    <span class="fw-light p">Front-end developer</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <span class="fw-bold h5">Skills</span><br>
                    <span class="fw-light p">ReactJS</span>
                </div>
            </div>
            <div class="contacts row">
                <div class="col">
                    <span class="fw-bold h5">Email</span><br>
                    <span class="fw-light p">whatever</span>
                </div>
                <div class="col">
                    <span class="fw-bold h5">Phonenumber</span><br>
                    <span class="fw-light p">whatever</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row fields">
        <div class="col relative">
            <div class="row category experience">
                <h2>Experience</h2>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold"><?php echo "$job_title"?></div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold">Creative director</div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
            </div>
            <div class="divider_line"></div>
            <div class="row category education">
                <h2>Education</h2>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold">Creative director</div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold">Creative director</div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
            </div>
            <div class="divider_line"></div>
            <div class="row category certificate">
                <h2>Certificate</h2>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold">Creative director</div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
                <div class="category-item">
                    <div class="brief mt-6">
                        <div class="title-2 fs-5 fw-bold">Creative director</div>
                        <span class="fw-light">(2018 - 2020)</span>
                    </div>
                    <span class="fw-bold fst-italic mb-6">Company name/Company location</span>
                    <p class="fw-light mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore sapiente saepe possimus esse culpa, inventore optio ipsa officiis iste, tempora aspernatur asperiores quaerat, nulla dolores dignissimos consequatur temporibus illo laborum?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php require __DIR__ . '/components/footer.php';  ?>