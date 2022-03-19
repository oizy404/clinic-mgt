<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\StudentBatchController;
use App\Http\Controllers\MedicalSupplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChartController;
use Illuminate\Http\Request;

// use App\Model\PatientProfile;
// use App\Model\MedicalSupply;
// use App\Model\MedType;
// use App\Model\User;
// use App\Model\Message;

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

// Route::get('/test', [test::class, "test"]);
Route::get('/loginPatient', function () {
    return view('pages.login.loginPatient');
})->name("loginPatient");

Route::get('/', function () {
    return view('pages.login.front');
})->name('front')->middleware('ifLoggedIn');


Route::post("authenticate", [LoginController::class, "login"])->name("login");
//------------ADMIN---------------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageAdminAccess'])->group(function () {

    Route::get('admin-home', [ChartController::class, 'medicalSupplyIndex'])->name("admin-home");

    Route::get('/health-data', [PatientController::class, "index"])->name("health-data");
    Route::get('/add-health-data', [PatientController::class, "index2"])->name("add-health-data");
    Route::post('/create-health-data', [PatientController::class, "insert"])->name("create-health-data");
    Route::get('editHealthData/{id}', [PatientController::class, "edit"])->name('edit-health-data');
    Route::post('updateHealthData/{id}', [PatientController::class, "update"])->name('update-health-data');
    Route::get('archiveHealthData/{id}', [PatientController::class, "archive"])->name('archiveHealthData');

    Route::post('/health-data',[PatientController::class,'import'])->name('student.import');

    Route::get('/medical-supplies-inventory', [MedicalSupplyController::class, "index"])->name("medical-supplies-inventory");
    Route::post('/add-medical-supply', [MedicalSupplyController::class, "insert"])->name("add-medical-supply");
    Route::get('archiveMedical/{id}', [MedicalSupplyController::class, "archive"])->name('archiveMedical');
    Route::get('editMedicalRecord/{id}', [MedicalSupplyController::class, "edit"])->name('edit-medical-record');
    Route::post('updateMedicalRecord/{id}', [MedicalSupplyController::class, "update"])->name('update-medical-record');

});  

//-------------DOCTOR--------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageDoctorAccess'])->group(function () {
    
    // Route::get('/appointments', function () {
    //     return view('pages.clinic_staff.appointments');
    // })->name("appointments");
    
    Route::get('index', [EventController::class, 'index'])->name("allEvent");
    Route::get('appointments', [EventController::class, 'index2'])->name("appointments");
    Route::post('store', [EventController::class, 'store'])->name("eventStore");
    // Route::get('deleteEvent/{id}', [EventController::class, 'destroy'])->name("deleteEvent");
    Route::get('archive-event/{id}', [EventController::class, "archive"])->name('archive-event');

    Route::get('/consultation-record', [ConsultationController::class, "index"])->name("consultation-record");
    Route::get('/add-consultation-record', [ConsultationController::class, "create"])->name("add-consultation-record");
    Route::post('/store-consultation-record', [ConsultationController::class, "store"])->name("store-consultation-record");
    Route::get('/show-consultation-record/{id}', [ConsultationController::class, "show"])->name("show-consultation-record");
    Route::get('/edit-consultation-record/{id}', [ConsultationController::class, "edit"])->name("edit-consultation-record");
    Route::post('/update-consultation-record/{id}', [ConsultationController::class, "update"])->name("update-consultation-record");
    Route::get('archive-consultation-record/{id}', [ConsultationController::class, "archive"])->name('archive-consultation-record');


    Route::get('/message-doctor', [MessageController::class, "doctorIndex"])->name("message-doctor");
    Route::post('/compose-doctormsg', [MessageController::class, "insertDoctorMsg"])->name("compose-doctormsg");
    Route::get('/show-doctormsg/{id}', [MessageController::class, "doctorMessageShow"])->name("show-doctormsg");

});

//--------------SUPERVISOR---------------------------------------------------------
// Route::middleware(['ifLoggedOut', 'manageSupervisorAccess'])->group(function () {

    // Route::get('/health-data', [PatientController::class, "index"])->name("health-data");
    // Route::get('/add-health-data', [PatientController::class, "index2"])->name("add-health-data");
    // Route::post('/create-health-data', [PatientController::class, "insert"])->name("create-health-data");
    // Route::get('editHealthData/{id}', [PatientController::class, "edit"])->name('edit-health-data');
    // Route::post('updateHealthData/{id}', [PatientController::class, "update"])->name('update-health-data');
    // Route::get('archiveHealthData/{id}', [PatientController::class, "archive"])->name('archiveHealthData');

    // Route::post('/health-data',[PatientController::class,'import'])->name('student.import');

    // Route::get('/medical-supplies-inventory', [MedicalSupplyController::class, "index"])->name("medical-supplies-inventory");
    // Route::post('/add-medical-supply', [MedicalSupplyController::class, "insert"])->name("add-medical-supply");
    // Route::get('archiveMedical/{id}', [MedicalSupplyController::class, "archive"])->name('archiveMedical');
    // Route::get('editMedicalRecord/{id}', [MedicalSupplyController::class, "edit"])->name('edit-medical-record');
    // Route::post('updateMedicalRecord/{id}', [MedicalSupplyController::class, "update"])->name('update-medical-record');

// });
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
//              $password ="clinicstaff";
//              echo Hash::make($password);
//          });
