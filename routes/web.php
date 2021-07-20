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

Route::get('/', function () {
    return view('pages.front');
});
Route::get('/admin-home', function () {
    return view('pages.admin-home');
});
Route::get('/student-health-data', function () {
    return view('pages.student-health-data');
});
Route::get('/student-consultation-record', function () {
    return view('pages.student-consultation-record');
});
Route::get('/personel-health-data', function () {
    return view('pages.personel-health-data');
});
Route::get('/personel-consultation-record', function () {
    return view('pages.personel-consultation-record');
});