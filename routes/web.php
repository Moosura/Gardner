<?php

use Illuminate\Support\Facades\Route;
use Thomdavis\Gardner\Farmer;

Route::get('/gardner/dashboard', function () {

    // TODO FACADE OBVI
    $farmer = new Farmer();
    return view('gardner::index', ['quote' => $farmer->inspire()]);

});