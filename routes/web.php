<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\RequestPath;
use Illuminate\Support\Facades\Route;

Route::get("/", [CityController::class, "index"])->middleware(RequestPath::class)->name("city.index");
Route::get("city/{city}/", [CityController::class, "show"])->name("city.show");

Route::get("/{city}/", [PageController::class, "home"])->name("city.home");
Route::get("/{city}/news", [PageController::class, "news"])->name("city.news");
Route::get("/{city}/about", [PageController::class, "about"])->name("city.about");





