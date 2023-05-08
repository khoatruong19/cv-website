<?php

require __DIR__ . '/router.php';
session_start();
Route::add('/', function() {
    if($_SESSION["valid"] != true){
        header("location: login");
    }
    require __DIR__ . '/pages/home.php';
});
Route::add('/find-employee', function() {
    if($_SESSION["valid"] != true){
        header("location: login");
    }
    require __DIR__ . '/pages/find-employee.php';
});
Route::add('/find-employee-process', function() {
    require __DIR__ . '/pages/find-employee-process.php';
});
Route::add('/login', function() {
    require __DIR__ . '/pages/login.php';
});
Route::add('/register', function() {
    require __DIR__ . '/pages/register.php';
});
Route::add('/init_table', function() {
    require __DIR__ . '/pages/inittable.php';
});


Route::submit();