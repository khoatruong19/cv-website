<?php

require __DIR__ . '/router.php';

Route::add('/', function() {
    require __DIR__ . '/pages/home.php';
});

Route::submit();