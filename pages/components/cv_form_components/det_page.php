<?php
    // $_SESSION['userId'] = 1;
    function formatSkills($skill){
        return $skill->value;
    }
    require __DIR__ . '../../../dbcontroller.php';
    $userId = $_SESSION['userId'];
    $sql = "SELECT * FROM cvs where id_user='$userId'";
    $first_name = ""; 
    $last_name = ""; 
    $email = ""; 
    $phone = ""; 
    $address = ""; 
    $job_title = ""; 
    $level = ""; 
    $skills = ""; 
    $bio = ""; 
    $avatar = ""; 
    $is_published = 0; 

    try{
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          if($row = mysqli_fetch_assoc($result)) {
            $first_name= $row["first_name"];
            $last_name= $row["last_name"];
            $email= $row["email"];
            $phone= $row["phone"];
            $address= $row["address"];
            $job_title= $row["job_title"];
            $level= $row["level"];
            $skills= $row["skills"];
            $bio= $row["bio"];
            $avatar= $row["avatar"];
            $is_published= $row["is_published"];
        }
        echo "<script>var isPublished = {$is_published}</script>";
        echo $level;

      } else {
          echo "No cv found";
      }
    }
    catch(mysqli_sql_exception){
      echo "FAil to query cv";
    }
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $job_title = $_POST['job_title'];
        $level = $_POST['level'];
        $skills = $_POST['skills'] ?? "";
        $level = $_POST['level'];
        $bio = $_POST['bio'];
        $id_user = $_SESSION['userId'];

        if(strlen($skills) > 0){
            $skills = json_decode($skills);
            $skills = array_map('formatSkills', $skills);
            $skills = join(";",$skills);
        }
        if(isset($_FILES['avatar']) && $_FILES['avatar']["name"] != "")
        {
            $file_name = $_FILES["avatar"]["name"];
            $file_size = $_FILES["avatar"]["size"];
            $file_tmp = $_FILES["avatar"]["tmp_name"];
            $file_type = $_FILES["avatar"]["type"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $file_name); //split
            $imageExtension = strtolower(end($imageExtension)); ////get extension

            if(!in_array($imageExtension, $validImageExtension)) ///check
            {
                echo
                "<script> alert('Invalid Image Extension'); </script>";
            }
            else{
                $newImageName = uniqid() . '.' . $imageExtension;

                $image = file_get_contents($file_tmp);
                $stmt = $conn->prepare("UPDATE cvs SET first_name=?, last_name=?, email=?, phone=?, address=?, avatar=?, level=?, job_title=?, skills=?, bio=? WHERE id_user=?;");
                $stmt->bind_param("ssssssssssi", $first_name, $last_name, $email, $phone, $address, $image, $level, $job_title, $skills, $bio, $id_user);
                $stmt->execute();
                $stmt->close();
            }
           
        }
        $stmt = $conn->prepare("UPDATE cvs SET first_name=?, last_name=?, email=?, phone=?, address=?, level=?, job_title=?, skills=?, bio=? WHERE id_user=?;");
        $stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $phone, $address, $level,$job_title, $skills, $bio, $id_user);
        $stmt->execute();
        $stmt->close();
    }
?>


<div class="cv_page_container position-relative" id="det_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold d-flex" style="justify-content: space-between">
        <span>Your details</span>
        <form action="" style="position: relative">
            <label for="is_publised">Make public: </label>
            <input type="checkbox" name="is_published" id="publish_checkbox" style="transform: scale(2.2); padding-bottom: 5px; position: relative; bottom: 4px; margin-left: 4px;">
           
        </form>
    </h2>
    <hr style="border-top: 2px solid black;">

    <div class="container" id="detail_form">
        <form class="position-relative" action="#" method="post" enctype="multipart/form-data">
            <!-- <div class="justify-content-between"> -->
            <div class="position-absolute col-md-4 w-25" style="right: 5vh;">
                <div class="text-center p-3 pb-0">
                    <img class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" src="../controllers/displayAva.php?user_id=<?php echo $_SESSION['userId']; ?>" alt="profile picture" />
                </div>
                <div class="d-block mb-4 d-flex justify-content-center align-items-center">
                    <input type="file" name="avatar" id="image_file" >
                    <!-- <button type="submit" onkeydown="uploadImage()" name="imagefile" id="image_upload" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Upload</button> -->
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <label for="det_firstName" class="form-label">First Name</label>
                    <input value="<?php echo (!empty($first_name) ? $first_name : ''); ?>" name="first_name" type="text" class="form-control border-input " id="first_name"">
                </div>
                <div class="col-md-4">
                    <label for="det_lastName" class="form-label">Last Name</label>
                    <input value="<?php echo (!empty($last_name) ? $last_name : ''); ?>" name="last_name" type="text" class="form-control border-input shadow" id="last_name"">
                </div>
            </div>
            <!-- <div class="col-md-4"></div> -->
            <!-- </div> -->
            <div class="row g-4">
                <div class="col-md-4">
                    <label for="det_mail" class="form-label">Email</label>
                    <input value="<?php echo (!empty($email) ? $email : ''); ?>" name="email" type="text" class="form-control border-input shadow" id="det_mail">
                </div>
                <div class="col-md-4">
                    <label for="det_phone" class="form-label">Phone No</label>
                    <input value="<?php echo (!empty($phone) ? $phone : ''); ?>" name="phone" type="text" class="form-control border-input shadow"  id="det_phone">
                </div>
            </div>
            <!-- <div class="col-md-6"></div> -->
            <div class="col-md-8">
                <label for="det_url" class="form-label">Address</label>
                <input value="<?php echo (!empty($address) ? $address : ''); ?>" name="address" type="text" class="form-control border-input shadow" id="det_address">
            </div>
            <div class="col-md-8">
                <label for="det_jobTitle" class="form-label">Job Title</label>
                <select name="job_title" id="det_jobTitle" class="form-control border-input shadow">
                    <option <?php echo (!empty($job_title))? "selected" : "" ?>  value=""></option>
                    <option <?php echo ($job_title === "Front-end Developer")? "selected" : "" ?> value="Front-end Developer">Front-end Developer</option>
                    <option <?php echo ($job_title === "Back-end Developer")? "selected" : "" ?> value="Back-end Developer">Back-end Developer</option>
                    <option <?php echo ($job_title === "Full-stack Developer")? "selected" : "" ?> value="Full-stack Developer">Full-stack Developer</option>
                </select>
            </div>
            <div class="col-md-8">
                <label for="det_level" class="form-label">Level</label>

                <select name="level" type="text" class="form-control border-input shadow" id="det_level">
                    <option <?php echo (!empty($level)) ?> value=""></option>
                    <option <?php echo ($level === "Intern")? "selected" : "" ?> value="Intern">Intern</option>
                    <option <?php echo ($level === "Fresher")? "selected" : "" ?> value="Fresher">Fresher</option>
                    <option <?php echo ($level === "Junior") ? "selected" : "" ?> value="Junior">Junior</option>
                    <option <?php echo ($level === "Middle")? "selected" : "" ?> value="Middle">Middle</option>
                    <option <?php echo ($level === "Senior")? "selected" : "" ?> value="Senior">Senior</option>
                    <option <?php echo ($level === "Leader")? "selected" : "" ?> value="Leader">Leader</option>
                </select>
            </div>
            <div class="col-md-8">
                <label for="det_skills" class="form-label">Skills</label>
                <input
                    id="skills-inp"
                    type="text"
                    name="skills"
                    autofocus
                    class="form-control border-input shadow"
                    value="<?php echo str_replace(";",",",$skills) ?>"
                />
            </div>
            <div class="col-12">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" type="text" class="form-control border-input shadow" style="height: 16vh">
                    <?php echo (!empty($bio) ? $bio : ''); ?>
                </textarea>
            </div>
            <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <div class="position-absolute bottom-0 w-100 row d-flex mb-4 d-block mb-2" style="height:5vh">
        <div class="col-4 col-md-12 d-flex flex-row-reverse">
            <button type="submit" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Next</button>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.getElementById('skills-inp');
    // initialize Tagify on the above input node reference
    new Tagify(input);
</script>
<script src="../js/cv_form_js/DetForm.js"></script>
<script>
    const checkbox = document.getElementById("publish_checkbox");
    
    checkbox.onchange = function(){
        if (checkbox.checked === true) {
            $.get('../controllers/detail_public.php');
        }
        else if (checkbox.checked === false) {
            $.get('../controllers/detail_private.php');
        };
    }
    if(isPublished) checkbox.checked = true;
    else checkbox.checked = false;
</script>

