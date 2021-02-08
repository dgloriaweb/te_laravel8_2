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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/', '\App\Http\Controllers\DashboardController@index')->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/admin', '\App\Http\Controllers\AdminController@index')->name('admin');
Route::middleware(['auth:sanctum', 'verified'])->get('/jobs', '\App\Http\Controllers\JobController@index')->name('jobs');
Route::middleware(['auth:sanctum', 'verified'])->get('/userjobs/{id}', '\App\Http\Controllers\UserJobController@show');

