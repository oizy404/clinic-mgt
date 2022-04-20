<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientUserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\StudentBatchController;
use App\Http\Controllers\MedicalSupplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ArchivedController;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;


// use App\Model\PatientProfile;
// use App\Model\MedicalSupply;
// use App\Model\MedType;
// use App\Model\User;
// use App\Model\Event;

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

// Route::post("signup/account", [UserManagementController::class, "insert"])->name("signup/account");

Route::post("authenticate", [LoginController::class, "login"])->name("login");
//------------ADMIN---------------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageAdminAccess'])->group(function () {

    Route::get('clinicstaff-dashboard', [ChartController::class, 'medicalSupplyIndex'])->name("clinicstaff-dashboard");

    Route::get('/health-data', [PatientController::class, "index"])->name("health-data");
    Route::get('/add-health-data', [PatientController::class, "create"])->name("add-health-data");
    Route::post('/create-health-data', [PatientController::class, "insert"])->name("create-health-data");
    Route::get('editHealthData/{id}', [PatientController::class, "edit"])->name('edit-health-data');
    Route::post('updateHealthData/{id}', [PatientController::class, "update"])->name('update-health-data');
    Route::get('showHealthData/{id}', [PatientController::class, "show"])->name('show-health-data');
    Route::get('archiveHealthData/{id}', [PatientController::class, "archive"])->name('archiveHealthData');
    Route::get('/archived-health-data', [PatientController::class, "archiveView"])->name("archived-health-data");
    Route::get('/delete-health-data/{id}', [PatientController::class, "delete"])->name("delete-health-data");
    Route::get('restoreHealthData/{id}', [PatientController::class, "restore"])->name('restoreHealthData');

    Route::post('/health-data',[PatientController::class,'import'])->name('student.import');

    Route::get('/clinicstaff/consultation-record', [ConsultationController::class, "index2"])->name("clinicstaff/consultation-record");
    Route::get('/clinicstaff/add/consultation-record', [ConsultationController::class, "create2"])->name("clinicstaff/add/consultation-record");
    Route::post('/clinicstaff/store/consultation-record', [ConsultationController::class, "store2"])->name("clinicstaff/store/consultation-record");
    Route::get('/clinicstaff/show/consultation-record/{id}', [ConsultationController::class, "show2"])->name("clinicstaff/show/consultation-record");
    Route::post('/clinicstaff/update/consultation-record/{id}', [ConsultationController::class, "update2"])->name("clinicstaff/update/consultation-record");
    Route::get('/clinicstaff/archive/consultation-record/{id}', [ConsultationController::class, "archive2"])->name('clinicstaff/archive/consultation-record');
    Route::get('/clinicstaff/archiveAll/consultation-record/{id}', [ConsultationController::class, "archiveAll2"])->name('clinicstaff/archiveAll/consultation-record');
    Route::get('/clinicstaff/printAll/consultation-record/{id}', [ConsultationController::class, "printAll2"])->name("clinicstaff/printAll/consultation-record");
    Route::get('/clinicstaff/print/health-eval/{id}', [ConsultationController::class, "print2"])->name("clinicstaff/print/health-eval");

    Route::get('/medical-supplies-inventory', [MedicalSupplyController::class, "index"])->name("medical-supplies-inventory");
    Route::post('/add-medical-supply', [MedicalSupplyController::class, "insert"])->name("add-medical-supply");
    Route::get('archiveMedical/{id}', [MedicalSupplyController::class, "archive"])->name('archiveMedical');
    Route::get('editMedicalRecord/{id}', [MedicalSupplyController::class, "edit"])->name('edit-medical-record');
    Route::post('updateMedicalRecord/{id}', [MedicalSupplyController::class, "update"])->name('update-medical-record');
    Route::get('/released-medical-supplies', [MedicalSupplyController::class, "releasedMedsView"])->name("released-medical-supplies");

    Route::get('/patientLogs-page', [UserManagementController::class, "index"])->name("patientLogs-page");
    Route::post("create/account", [UserManagementController::class, "insert"])->name("create/account");
    Route::get('edit-user-details/{id}', [UserManagementController::class, "edit"])->name("edit-user-details");
    Route::post('update-user-details/{id}', [UserManagementController::class, "update"])->name("update-user-details");

    Route::post('/user-accounts',[UserManagementController::class,'import'])->name('user.import');

    Route::get('/activity/login/logout', [UserManagementController::class, "activityLogInLogOut"])->name("/activity/login/logout");
    Route::get('/print/activity-logs', [UserManagementController::class, "print"])->name("print/activity-logs");

    
    // Route for view/blade file.
    // Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
    // Route for export/download tabledata to .csv, .xls or .xlsx
    Route::get('exportExcel/{type}', [UserManagementController::class, 'exportExcel'])->name('exportExcel');
    // Route for import excel data to database.
    // Route::post('importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');


    Route::get('clinicstaff/index', [EventController::class, 'clinicstaffIndex'])->name("allEvents");
    Route::get('/clinicstaff/appointments', [EventController::class, 'clinicstaffIndex2'])->name("clinicstaff/appointments");
    Route::post('clinicstaff/storeEvent2', [EventController::class, 'store2'])->name("clinicstaff/eventStore2");
    Route::get('clinicstaff/archiveEvent2/{id}', [EventController::class, "archive2"])->name('clinicstaff/archiveEvent2');

    Route::get('/message-clinicstaff', [MessageController::class, "clinicstaffIndex"])->name("message-clinicstaff");
    Route::get('/message-clinicstaff-new', [MessageController::class, "clinicstaffCreateNew"])->name("message-clinicstaff-new");
    Route::get('/clinicstaffViewCreate/{id}', [MessageController::class, "clinicstaffViewCreate"])->name("clinicstaffViewCreate");
    Route::post('/insertClinicstaffMsg/{id}', [MessageController::class, "insertClinicstaffMsg"])->name("insertClinicstaffMsg");

    

});  

//-------------DOCTOR--------------------------------------------------------------
Route::middleware(['ifLoggedOut', 'manageDoctorAccess'])->group(function () {
    // Route::get('/doctor-dashboard', function () {
    //     return view('pages.clinic_staff.doctor-dashboard');
    // })->name("doctor-dashboard");
    
    Route::get('index', [EventController::class, 'index'])->name("allEvent");
    Route::get('appointments', [EventController::class, 'index2'])->name("appointments");
    Route::post('store', [EventController::class, 'store'])->name("eventStore");
    Route::get('archiveEvent/{id}', [EventController::class, "archive"])->name('archiveEvent');

    Route::get('/doctor/consultation-record', [ConsultationController::class, "index"])->name("doctor/consultation-record");
    Route::get('/doctor/add/consultation-record', [ConsultationController::class, "create"])->name("doctor/add/consultation-record");
    Route::post('/doctor/store/consultation-record', [ConsultationController::class, "store"])->name("doctor/store/consultation-record");
    Route::get('/doctor/show/consultation-record/{id}', [ConsultationController::class, "show"])->name("doctor/show/consultation-record");
    Route::post('/doctor/update/consultation-record/{id}', [ConsultationController::class, "update"])->name("doctor/update/consultation-record");
    Route::get('/doctor/archive/consultation-record/{id}', [ConsultationController::class, "archive"])->name('doctor/archive/consultation-record');
    Route::get('/doctor/archiveAll/consultation-record/{id}', [ConsultationController::class, "archiveAll"])->name('doctor/archiveAll/consultation-record');
    Route::get('/doctor/printAll/consultation-record/{id}', [ConsultationController::class, "printAll"])->name("doctor/printAll/consultation-record");
    Route::get('/doctor/print/health-eval/{id}', [ConsultationController::class, "print"])->name("doctor/print/health-eval");

    Route::get('/message-doctor', [MessageController::class, "doctorIndex"])->name("message-doctor");
    Route::get('/doctorViewCreate/{id}', [MessageController::class, "doctorViewCreate"])->name("doctorViewCreate");
    Route::post('/insertDoctorMsg/{id}', [MessageController::class, "insertDoctorMsg"])->name("insertDoctorMsg");

});

//--------------PATIENT---------------------------------------------------------
Route::post("authenticate-patient", [LoginController::class, "loginPatient"])->name("loginPatient");

Route::middleware(['ifLoggedOut', 'managePatientAccess'])->group(function () {

    Route::get('/patient-dashboard', [PatientUserController::class, "index"])->name("patient-dashboard");
    Route::get('viewHealthData', [PatientUserController::class, "patientView"])->name('view-health-data');
    Route::get('edit-healthdata/{id}', [PatientUserController::class, "patientEdit"])->name('edit-healthData');
    Route::post('update-healthdata/{id}', [PatientUserController::class, "patientUpdate"])->name('update-healthdata');
    Route::post('/compose-patientmsg', [PatientUserController::class, "insertPatientMsg"])->name("compose-patientmsg");
    
});

Route::post('/registerPatient', [LoginController::class, "registerPatient"])->name("registerPatient");

Route::get('/logout', function (Request $request) {

    $dt = Carbon::now();
	$todayDate = $dt->toDayDateTimeString();


        $user_name = Auth::user()->username;

        $activityLog = [
            'user_name' => $user_name,
            'description' => 'Log Out',
            'date_time' => $todayDate,
        ];

        DB::table('activity_logs')->insert($activityLog);

        Auth::logout();
        $request->session()->flush();
        return redirect()->route('front');
    
});


Route::get('/test', function(){
             $password ="doctor";
             echo Hash::make($password);
         });
