<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/",[HomeController::class,"index"])->name("home");
Route::get("/service",[HomeController::class,"service"])->name("service");
Route::get("/blog",[HomeController::class,"blog"])->name("blog");
Route::get("/contact",[HomeController::class,"contact"])->name("contact");
Route::post("/contactSubmit",[HomeController::class,"contactSubmit"])->name("contactSubmit");

require __DIR__."/dashboard.php";
require __DIR__.'/auth.php';
