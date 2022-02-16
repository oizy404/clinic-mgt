<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentBatchController;
use App\Http\Controllers\MedicalSupplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChartController;
use Illuminate\Http\Request;

use App\Model\PatientProfile;
use App\Model\MedicalSupply;
use App\Model\MedType;
use App\Model\User;
use App\Model\Message;

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

Route::get('/test', [test::class, "test"]);

Route::get('/', function () {
    return view('pages.front');
})->name('front')->middleware('ifLoggedIn');


Route::post("authenticate", [LoginController::class, "login"])->name("login");
//------------ADMIN---------------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageAdminAccess'])->group(function () {

    Route::get('admin-home', [ChartController::class, 'medicalSupplyIndex'])->name("admin-home");

});  

//-------------DOCTOR--------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageDoctorAccess'])->group(function () {
    
    Route::get('/appointments', function () {
        return view('pages.appointments');
    })->name("appointments");
    
    Route::get('index', [EventController::class, 'index'])->name("allEvent");
    Route::post('store', [EventController::class, 'store'])->name("eventStore");
    Route::get('deleteEvent/{id}', [EventController::class, 'destroy'])->name("deleteEvent");

    Route::get('/student-consultation-record', function () {
        return view('pages.student-consultation-record');
    })->name("student-consultation-record");
    
    Route::get('/message-doctor', [MessageController::class, "doctorIndex"])->name("message-doctor");
    Route::post('/compose-doctormsg', [MessageController::class, "insertDoctorMsg"])->name("compose-doctormsg");
    Route::get('/show-doctormsg/{id}', [MessageController::class, "doctorMessageShow"])->name("show-doctormsg");

});

//--------------SUPERVISOR---------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageSupervisorAccess'])->group(function () {

    Route::get('/student-health-data', [PatientController::class, "index"])->name("student-health-data");
    Route::get('/create-student-health-data', [PatientController::class, "insert"])->name("create-student-health-data");
    Route::post('/student-health-data',[PatientController::class,'import'])->name('student.import');

    Route::get('/medical-supplies-inventory', [MedicalSupplyController::class, "index"])->name("medical-supplies-inventory");
    Route::post('/add-medical-supply', [MedicalSupplyController::class, "insert"])->name("add-medical-supply");
    Route::get('delete/{id}', [MedicalSupplyController::class, "delete"])->name('delete');
    Route::get('edit/{id}', [MedicalSupplyController::class, "edit"])->name('edit-medical-record');
    Route::post('update/{id}', [MedicalSupplyController::class, "update"])->name('update-medical-record');

});
//--------------PATIENT---------------------------------------------------------
Route::post("authenticate-patient", [LoginController::class, "loginPatient"])->name("loginPatient");

Route::middleware(['ifLoggedOut', 'managePatientAccess'])->group(function () {

    Route::get('/patient-dashboard', [MessageController::class, "patientIndex"])->name("patient-dashboard");
    Route::post('/compose-patientmsg', [MessageController::class, "insertPatientMsg"])->name("compose-patientmsg");
});

Route::post('/registerPatient', [LoginController::class, "registerPatient"])->name("registerPatient");

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->flush();
    return redirect()->route('front');
});


// Route::get('/test', function(){
//              $password ="supervisor";
//              echo Hash::make($password);
//          });
