 <?php require __DIR__ . '/components/header.php';  ?> 

<body>

<div class="relative h-[100vh]">
    <div class="p-5 bg-primary pr-20 h-[50%]">
        <div class="flex items-center justify-between">
            <?php require __DIR__ . '/components/row-logo.php'; ?>
            <div>
                <a class="text-2xl font-semibold hover:text-violet-400" href="/login">LOGIN</a>
            </div>
        </div>
        <div class="cursor-pointer hover:shadow-2xl flex flex-col items-center justify-center mt-[120px] ml-auto w-[400px] h-[200px] bg-white shadow-lg rounded-lg">
            <img class="w-[30%]" alt="edit-user" src="../images/edit-user.png" />
            <h1 class="text-2xl font-semibold mt-5">Your CV</h1>
        </div>
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