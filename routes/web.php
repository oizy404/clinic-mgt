<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentBatchController;
use App\Http\Controllers\MedicalSupplyController;
// use Illuminate\Http\Request;

use App\Model\Student;
use App\Model\MedicalSupply;
use App\Model\MedType;

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
})->name('front')->middleware('ifLoggedIn');

Route::post("authenticate", [LoginController::class, "login"])->name("login");

// Route::middleware(['ifLoggedOut'])->group(function () {

    Route::get('/admin-home', function () {
        return view('pages.admin-home');
    })->name("admin-home");
// });
//Route::get('/student-health-data', [StudentController::class, "index"])->name('studentHealthData');

// Route::get('/student-consultation-record', function () {
//     return view('pages.student-consultation-record');
// });
// Route::get('/personnel-health-data', function () {
//     return view('pages.personnel-health-data');
// });
// Route::get('/personnel-consultation-record', function () {
//     return view('pages.personnel-consultation-record');
// });

//Route::get('/student-health-data', [StudentController::class, "importForm"]);
// Route::resource('tbl_students', StudentController::class);
Route::get('/student-health-data', [StudentController::class, "index"])->name("student-health-data");
Route::get('/create-student-health-data', [StudentController::class, "insert"])->name("create-student-health-data");

Route::post('/student-health-data',[StudentController::class,'import'])->name('student.import');



Route::get('/medical-supplies-inventory', [MedicalSupplyController::class, "index"])->name("medical-supplies-inventory");
// Route::get('/add-medical-supplies', [MedicalSupplyController::class, "add"])->name("add-medical-supplies");
Route::post('/add-medical-supply', [MedicalSupplyController::class, "insert"])->name("add-medical-supply");
Route::get('delete/{id}', [MedicalSupplyController::class, "delete"])->name('delete');
Route::get('edit/{id}', [MedicalSupplyController::class, "edit"])->name('edit-medical-record');
Route::post('update/{id}', [MedicalSupplyController::class, "update"])->name('update-medical-record');


// Route::get('/test', function(){
//              $password ="admin";
//              echo Hash::make($password);
//          });

// Route::get('/medical-supplies-inventory', function () {
//     return view('pages.medical-supplies-inventory');
// });