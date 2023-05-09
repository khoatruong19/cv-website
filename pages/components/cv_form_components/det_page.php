<?php
    $_SESSION['userId'] = 1;
    include './dbcontroller.php';

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $job_title = $_POST['job_title'];
        $level = $_POST['level'];
        $skills = $_POST['skills'];
        $level = $_POST['level'];
        // $bio = $_POST['bio'];
        $bio ="";
        $id_user = $_SESSION['userId'];

        if(isset($_FILES['avatar']))
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
            }

            $stmt = $conn->prepare("UPDATE cvs SET first_name=?, last_name=?, email=?, phone=?, address=?, avatar=?, level=?, skills=?, bio=? WHERE id_user=?;");
            $stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $phone, $address, $image, $level, $skills, $bio, $id_user);
            $stmt->execute();
            $stmt->close();
        }
    }
?>


<div class="cv_page_container position-relative" id="det_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold">your details</h2>
    <hr style="border-top: 2px solid black;">

    <div class="container" id="detail_form">
        <form class="position-relative" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <!-- <div class="justify-content-between"> -->
            <div class="position-absolute col-md-4 w-25" style="right: 5vh;">
                <div class="text-center p-3 pb-0">
                    <img class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" src="../controllers/displayAva.php?user_id=<?php echo $_SESSION['userId']; ?>" alt="profile picture" />
                </div>
                <div class="d-block mb-4 d-flex justify-content-center align-items-center">
                    <input type="file" name="avatar" id="image_file">
                    <!-- <button type="submit" onkeydown="uploadImage()" name="imagefile" id="image_upload" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Upload</button> -->
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <label for="det_firstName" class="form-label">First Name</label>
                    <input name="first_name" type="text" class="form-control border-input " id="first_name"">
                </div>
                <div class="col-md-4">
                    <label for="det_lastName" class="form-label">Last Name</label>
                    <input name="last_name" type="text" class="form-control border-input shadow" id="last_name"">
                </div>
            </div>
            <!-- <div class="col-md-4"></div> -->
            <!-- </div> -->
            <div class="row g-4">
                <div class="col-md-4">
                    <label for="det_mail" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control border-input shadow" id="det_mail">
                </div>
                <div class="col-md-4">
                    <label for="det_phone" class="form-label">Phone No</label>
                    <input name="phone" type="text" class="form-control border-input shadow"  id="det_phone">
                </div>
            </div>
            <!-- <div class="col-md-6"></div> -->
            <div class="col-md-8">
                <label for="det_url" class="form-label">Address</label>
                <input name="address" type="text" class="form-control border-input shadow" id="det_address">
            </div>
            <div class="col-md-8">
                <label for="det_jobTitle" class="form-label">Job Title</label>
                <select name="job_title" id="det_jobTitle" class="form-control border-input shadow">
                    <option selected value=""></option>
                    <option value="Front-end Developer">Front-end Developer</option>
                    <option value="Back-end Developer">Back-end Developer</option>
                    <option value="Full-stack Developer">Full-stack Developer</option>
                </select>
            </div>
            <div class="col-md-8">
                <label for="det_level" class="form-label">Level</label>
                <select name="level" type="text" class="form-control border-input shadow" id="det_level">
                    <option selected value=""></option>
                    <option value="Intern">Intern</option>
                    <option value="Fresher">Fresher</option>
                    <option value="Junior">Junior</option>
                    <option value="Middle">Middle</option>
                    <option value="Senior">Senior</option>
                    <option value="Leader">Leader</option>
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
                />
            </div>
            <div class="col-12">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" type="text" class="form-control border-input shadow" style="height: 16vh"></textarea>
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
<!-- <script>
    // The DOM element you wish to replace with Tagify
    var input = document.getElementById('skills-inp');
    // initialize Tagify on the above input node reference
    new Tagify(input);
</script>
    <script>
        document.getElementById("first_name").value = getSavedValue("first_name");
        document.getElementById("last_name").value = getSavedValue("last_name");
        document.getElementById("det_mail").value = getSavedValue("det_mail");
        document.getElementById("det_phone").value = getSavedValue("det_phone");
        document.getElementById("det_address").value = getSavedValue("det_address");
        document.getElementById("det_jobTitle").value = getSavedValue("det_jobTitle");
        document.getElementById("det_level").value = getSavedValue("det_level");
        document.getElementById("skills-inp").value = getSavedValue("skills-inp");
        document.getElementById("det_bio").value = getSavedValue("det_bio");


        function uploadImage(){
            let file_data = $("#image_file").prop("files")[0];
            let form_data = new FormData();
            form_data.append("file", file_data);
            $.ajax({
                url: "load.php",
                type: "POST",
                dataType: "script",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,

                success: function(data){
                    if (data === 1) alert("Successful");
                    else alert("Unable to upload image");
                }
            });
        }

        function saveValue(e){
            var id = e.id;
            var val = e.value;
            localStorage.setItem(id, val);
        }

        function getSavedValue(v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
        }

        handleSubmitFilter = function(){
            const form_data = new FormData();
            const formEle = document.getElementsByClassName("form-control");
            for(let count = 0; count < formEle.length; count++){
                if(formEle[count].name){
                    formData.append(formEle[count].name, formEle[count].value)
                }
            }
        }
    </script> -->
