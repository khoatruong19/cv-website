<head>
  <meta charset="utf-8">
  <title>CV web</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="CV Web">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="HCMUT">
  <meta name="generator" content="CV Web">
  <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
  <link
      href="https://unpkg.com/@yaireo/tagify/dist/tagify.css"
      rel="stylesheet"
      type="text/css"
    />
  <script src="https://kit.fontawesome.com/7633094b57.js" crossorigin="anonymous"></script> 

   <script src="https://cdn.tailwindcss.com"></script> 
 
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#E5F3FF',
          }
        }
      }
    }
  </script>

</head>

<body>

<div class="relative h-[100vh]">

    <div class="flex items-start h-52 p-5 bg-primary">
        <div class="w-[50%]">
            <?php require __DIR__ . '/components/row-logo.php';  ?> 
        </div>
        <h1 class="text-4xl font-semibold mt-8 ml-[-62px] text-center">FIND THE PERFECT FIT FOR YOUR TEAM</h1>
    </div>

    <div class="flex items-start h-52 p-5 gap-20">
        <form id="filter-form" onsubmit="handleSubmitFilter();return false;" action="#" method="post" class="flex flex-col gap-8 w-[40%] h-[80vh] shadow-2xl bg-white translate-y-[-10%] translate-x-[5%] rounded-lg overflow-y-auto py-3 px-5">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold">Filter</h2>
                <span class="text-xl text-red-500 font-bold hover:opacity-70 cursor-pointer">Clear all</span>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Position</h3>
                <select name="position" id="position-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer">
                    <option selected>All</option>
                    <option>Front-end Developer</option>
                    <option>Back-end Developer</option>
                    <option>Full-stack Developer</option>
                </select>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Level</h3>
                <select name="level" id="level-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer">
                    <option selected>All</option>
                    <option>Intern</option>
                    <option>Fresher</option>
                    <option>Junior</option>
                    <option>Middle</option>
                    <option>Senior</option>
                    <option>Leader</option>
                </select>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Years Of Experience</h3>
                <select name="experience" id="experience-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer max-w-[185px]">
                    <option selected>None</option>
                    <option>Less than 1 year</option>
                    <option>1-2 years</option>
                    <option>2-3 years</option>
                    <option>3-5 years</option>
                    <option>More than 5 years</option>
                </select>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Skills</h3>
                <input
                    id="skills-input"
                    type="text"
                    class="form-data w-full px-2 py-1 text-sm border border-gray-300 rounded outline-none max-h-[50px] overflow-y-auto"
                    name="skills"
                    value=""
                    autofocus
                />
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold bg-success">Location</h3>
                <select name="location" id="location-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer max-w-[185px]">
                    <option selected>None</option>
                    <option>Ho Chi Minh</option>
                    <option>Ha Noi</option>
                </select>
            </div>
            <button id="submit" type="submit" class="px-3 py-1.5 w-fit mx-auto bg-primary rounded-md font-semibold hover:opacity-70">Submit</button>
        </form>
        <div class="w-[60%]">
            <form action="#" onsubmit="handleSearchJobTitle()" method="POST">
                <div class="w-[500px] mx-auto flex items-center gap-2 h-12 px-4 bg-white rounded-2xl shadow-2xl translate-y-[-97%]">
                    <input id="job-title-input" class="flex-1 h-[100%] outline-none" type="text" placeholder="Search for job title" />   
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form>

            <div class="mt-0 flex flex-col gap-6 h-[100%] h-full pr-6">
                <div class="px-5 py-4 h-[500px] flex items-center shadow-lg hover:shadow-xl cursor-pointer rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-lg hover:shadow-xl cursor-pointer rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-lg hover:shadow-xl cursor-pointer rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-lg hover:shadow-xl cursor-pointer rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 max-w-[200px] mx-auto">
                    <div class="h-10 w-10 bg-[#D3D1D1] hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">1</div>
                    <div class="h-10 w-10 bg-white hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">2</div>
                    <div class="h-10 w-10 bg-white hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">3</div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=skills]');
    // initialize Tagify on the above input node reference
    new Tagify(input);
</script>
<script src="../js/find-employee.js"></script>


<?php require __DIR__ . '/components/footer.php';  ?>

<?php
    include "dbcontroller.php";
    function formatSkills($skill){
        return $skill->value;
    }
    if(isset($_POST["position"]) || isset($_POST["level"]) || isset($_POST["experience"]) || isset($_POST["skills"]) || isset($_POST["location"])){
    
    $position = $_POST["position"];
    $level = $_POST["level"];
    $experience = $_POST["experience"];
    $skills = $_POST["skills"];
    $location = $_POST["location"];

    // $skills = json_decode($skills);
    // $skills = array_map('formatSkills', $skills);
    // $skills = join(";",$skills);

    $sql = "SELECT * FROM cvs";

    // echo  $position;
    // echo  $level;
    // echo  $experience;
    // echo  $skills;
    // echo  $location;

    try{
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "{$row["last_name"]}";
            }
        } else {
            echo "No cvs found";
        }
      }
      catch(mysqli_sql_exception){
        echo "FAil to query cvs";
      }

    }
?>