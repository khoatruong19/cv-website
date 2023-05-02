<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV_form</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
    rel="stylesheet"
    />
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
    ></script>

    <link rel="stylesheet" href="../styles/cv_form.css">
    <link rel="stylesheet" href="../scss/test_cus.css">

</head>
<!-- <body> -->
<body data-bs-spy="scroll" data-bs-target="#sidebar_list" data-bs-offset="0" class="scrollspy w-100" tabindex="0" style="overflow-x:hidden">
    <div class="row">
        <aside class="col-12 col-sm-2 p-0 d-flex flex-column sticky-top font_aside" style="height:100vh; background-color: rgb(160,160,160)">
            <div class="text-center p-3 pb-0">
                <img class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow"src="https://impreza.us-themes.com/wp-content/uploads/paolo-bendandi-D-8XODEIr_s-unsplash.jpg" alt="profile picture" />
            </div>
            <div class="d-block mb-4 d-flex justify-content-center align-items-center">
                <p class="text-dark text-uppercase fw-bold custom_name">Huy Hieu</p>
            </div>
            <div class="list-group list-group-flush position-stick vh-100"  id="sidebar_list">
                <a href="#"             class="d-block p-4 list-group-item list-group-item-action list-group-item border-bottom border-top  d-flex justify-content-center align-items-center text-dark text-decoration-none text-uppercase">details</a>
                <a href="#item-1" class="d-block p-4  list-group-item-action  list-group-item border-bottom d-flex justify-content-center align-items-center text-dark text-decoration-none text-uppercase ">experience</a>
                <a href="#item-2" class="d-block p-4  list-group-item-action  list-group-item border-bottom d-flex justify-content-center align-items-center text-dark text-decoration-none text-uppercase ">education</a>
                <a href="#item-3" class="d-block p-4  list-group-item-action  list-group-item border-bottom d-flex justify-content-center align-items-center text-dark text-decoration-none text-uppercase ">certificates</a>
            </div>
        </aside>
        <div class="col-12 col-sm-9 m-2">
            <div class="" id="item-1">
                <?php
                    include('./components/cv_form_components/exp_page.php');
                ?>
            </div>
            <div class="" id="item-2">
                <?php
                    include('./components/cv_form_components/edu_page.php');
                ?>
            </div>
            <div class="pb-2" id="item-3">
                <?php
                    include('./components/cv_form_components/cer_page.php');
                ?>
            </div>
        </div>
    </div>


</div>
</body>
</html>