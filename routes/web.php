<?php

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
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;

Route::name("public.")->group(
    function () {
        Route::get("", [PageController::class, "home"])->name("home");
    }
);

Route::name("secure.")->middleware(["auth"])->group(
    function () {
        Route::get("dashboard", [DashboardController::class, "home"])->name("dashboard");
    }
);

require __DIR__.'/auth.php';
