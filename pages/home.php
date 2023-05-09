 <?php 
    require __DIR__ . '/dbcontroller.php';
 ?> 

<!DOCTYPE html>
<html lang="en">
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

<body id="body">

<body>

<div class="relative h-[100vh]">
    <div class="p-5 bg-primary pr-20 h-[50%]">
        <div class="flex items-center justify-between">
            <?php require __DIR__ . '/components/row-logo.php'; ?>
            <div>
                <p class="text-2xl font-semibold hover:text-violet-400" >
                 Hello, <?php
                    echo "{$_SESSION["firstName"]} {$_SESSION["lastName"]}";
                  ?>
                </p>
            </div>
        </div>
        <a href='http://localhost/cv-form'>
          <div class="cursor-pointer hover:shadow-2xl flex flex-col items-center justify-center mt-[78px] ml-auto w-[400px] h-[200px] bg-white shadow-lg rounded-lg">
              <img class="w-[30%]" alt="edit-user" src="../images/edit-user.png" />
              <h1 class="text-2xl font-semibold mt-5">Your CV</h1>
          </div>
        </a>
    </div>

    <p class="absolute top-[50%] left-[10%] translate-y-[-50%] text-8xl leading-[8rem] font-medium">YOU ARE </br> HERE TO ...</p>
    <div class="p-5 pr-20 ">
        <a href="/find-employee" class="mt-[55px] relative bg-primary cursor-pointer hover:shadow-2xl flex flex-col items-center justify-center my-5 ml-auto w-[400px] h-[200px] shadow-lg rounded-lg">
            <img class="absolute top-[40px] w-[48%] mt-[-55px] h-[90%]" alt="edit-user" src="../images/employer.png" />
            <h1 class="text-2xl font-semibold mt-[140px]">Find Employee</h1>
        </a >
    </div>
</div>


<script src="../js/home.js"></script>

<?php require __DIR__ . '/components/footer.php';  ?>