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
    function clearAllFilter(){
    const formEle = document.getElementsByClassName("form-data") 
    for(let count = 0; count < formEle.length; count++){
       if(formEle[count].name === "position" || formEle[count].name === "level" || 
       formEle[count].name === "experience") formEle[count].value = "all"
       else formEle[count].value = ""
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
        <form id="filter-form" onsubmit="handleSubmitFilter();return false;" action="#" method="post" class="flex flex-col gap-7 w-[40%] h-[80vh] shadow-2xl bg-white translate-y-[-10%] translate-x-[5%] rounded-lg overflow-y-auto py-3 px-5">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold">Filter</h2>
                <span onclick="clearAllFilter()" class="text-xl text-red-500 font-bold hover:opacity-70 cursor-pointer">Clear all</span>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Position</h3>
                <select name="position" id="position-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer">
                    <option selected value="all">All</option>
                    <option value="Front-end Developer">Front-end Developer</option>
                    <option value="Back-end Developer">Back-end Developer</option>
                    <option value="Full-stack Developer">Full-stack Developer</option>
                </select>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Level</h3>
                <select name="level" id="level-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer">
                    <option selected value="all">All</option>
                    <option value="Intern">Intern</option>
                    <option value="Fresher">Fresher</option>
                    <option value="Junior">Junior</option>
                    <option value="Middle">Middle</option>
                    <option value="Senior">Senior</option>
                    <option value="Leader">Leader</option>
                </select>
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold">Years Of Experience</h3>
                <select name="experience" id="experience-input" class="form-data outline-none w-full p-2 border-2 border-primary rounded-md appearance-none cursor-pointer max-w-[185px]">
                    <option selected value="all">None</option>
                    <option value="0-1">Less than 1 year</option>
                    <option value="1-2">1-2 years</option>
                    <option value="2-3">2-3 years</option>
                    <option value="3-5">3-5 years</option>
                    <option value="5-100">More than 5 years</option>
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
                    autofocus
                />
            </div>
            <?php require __DIR__ . '/components/divider.php';  ?> 
            <div class="flex items-center gap-5">
                <h3 class="text-2xl font-semibold bg-success">Location</h3>
                <input
                    id="location-input"
                    type="text"
                    class="form-data w-full px-2 py-1 text-sm border border-gray-300 rounded outline-none h-[43px] overflow-y-auto"
                    name="location"
                    autofocus
                />
            </div>
            <button id="submit" type="submit" class="px-3 py-1.5 w-fit mx-auto bg-primary rounded-md font-semibold hover:opacity-70">Submit</button>
        </form>
        <div class="w-[60%]">
            <form action="#" onsubmit="handleSubmitFilter(1, true);return false;" method="post">
                <div class="w-[500px] mx-auto flex items-center gap-2 h-12 px-4 bg-white rounded-2xl shadow-2xl translate-y-[-97%]">
                    <input id="job-title-input" class="flex-1 h-[100%] outline-none" type="text" placeholder="Search for job title" />   
                    <button type="submit">
                     <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>

            <div class="mt-0 flex flex-col gap-6 h-[600px] pr-6">
                <div id="cvs-list" class="mt-0 flex flex-col gap-6 h-[100%] h-full pr-6">


           
                </div>
                <div id="pagination" class="flex items-center gap-2 max-w-[200px] mx-auto">
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

