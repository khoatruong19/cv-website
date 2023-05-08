<?php

require __DIR__ . '/router.php';

Route::add('/', function() {
    require __DIR__ . '/pages/home.php';
});
Route::add('/find-employee', function() {
    require __DIR__ . '/pages/find-employee.php';
});
Route::add('/find-employee-process', function() {
    require __DIR__ . '/pages/find-employee-process.php';
});
Route::add('/view-employee', function() {
    require __DIR__ . '/pages/view-employee.php';
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