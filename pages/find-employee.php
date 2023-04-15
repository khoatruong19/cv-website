 <?php require __DIR__ . '/components/header.php';  ?> 

<body>

<div class="relative h-[100vh]">

    <div class="flex items-start h-52 p-5 bg-primary">
        <div class="w-[50%]">
            <?php require __DIR__ . '/components/row-logo.php';  ?> 
        </div>
        <h1 class="text-3xl font-semibold mt-8">FIND THE PERFECT FIT FOR YOUR TEAM</h1>
    </div>

    <div class="flex items-start h-52 p-5 gap-20">
        <div class="w-[40%] h-[80vh] shadow-2xl bg-white translate-y-[-10%] translate-x-[5%] rounded-lg">
            
        </div>
        <div class="w-[60%]">
            <div class="w-[500px] mx-auto flex items-center gap-2 h-12 px-4 bg-white rounded-2xl shadow-2xl translate-y-[-97%]">
                <input class="flex-1 h-[100%] outline-none"  type="text" placeholder="Search for job title" />   
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div class="mt-0 flex flex-col gap-6 h-[100%] h-full pr-6">
                <div class="px-5 py-4 h-[500px] flex items-center shadow-2xl rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-2xl rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-2xl rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                <div class="px-5 py-4 h-[500px] flex items-center shadow-2xl rounded-2xl bg-white flex-1 gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">John Doe</h3>
                        <p class="text-base font-medium text-gray-400">Front-end Developer</p>
                        <p class="text-base font-medium text-gray-400">Ho Chi Minh city, Viet Nam</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 max-w-[200px] mx-auto mt-5">
                    <div class="h-10 w-10 bg-[#D3D1D1] hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">1</div>
                    <div class="h-10 w-10 bg-white hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">2</div>
                    <div class="h-10 w-10 bg-white hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">3</div>
                </div>
            </div>
        </div>

    </div>

</div>


<!-- <script src="../js/find.js"></script> -->

<?php require __DIR__ . '/components/footer.php';  ?>