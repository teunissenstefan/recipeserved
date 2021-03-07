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

Route::get("/", "\App\Http\Controllers\GeneralController@home")->name("home");
Route::get("/formatting", "\App\Http\Controllers\GeneralController@formatting")->name("formatting");
Route::get("/dashboard", "\App\Http\Controllers\GeneralController@dashboard")->name("dashboard");

Route::resource('recipes', \App\Http\Controllers\RecipeController::class);
Route::get("/recipes/{recipe}/delete", "\App\Http\Controllers\RecipeController@confirmDestroy")->name("recipes.confirmdestroy");
Route::get("/myrecipes", "\App\Http\Controllers\GeneralController@myRecipes")->name("recipes.mine");
Route::get("/search", "\App\Http\Controllers\SearchController@results")->name("recipes.search");

require __DIR__.'/auth.php';
