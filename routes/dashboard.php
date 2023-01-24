<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->prefix("dashboard")->as('admin.')->group(function(){
    Route::get("/",[DashboardController::class,"index"])->name("dashboard");
    Route::resource("service",ServiceController::class);
    Route::resource("blog",BlogController::class);
    Route::resource("section",SectionController::class);
   });


