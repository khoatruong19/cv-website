<?php

require __DIR__ . '/router.php';

Route::add('/', function() {
    require __DIR__ . '/pages/home.php';
});
Route::add('/login', function() {
    require __DIR__ . '/pages/login.php';
});
Route::add('/register', function() {
    require __DIR__ . '/pages/register.php';
});


Route::submit();