<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\TrainingTypeController;

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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('em/dashboard', 'emDashboard')->name('em/dashboard');
});

// -----------------------------settings----------------------------------------//
Route::controller(SettingController::class)->group(function () {
    Route::get('company/settings/page', 'companySettings')->middleware('auth')->name('company/settings/page');
    Route::get('roles/permissions/page', 'rolesPermissions')->middleware('auth')->name('roles/permissions/page');
    Route::post('roles/permissions/save', 'addRecord')->middleware('auth')->name('roles/permissions/save');
    Route::post('roles/permissions/update', 'editRolesPermissions')->middleware('auth')->name('roles/permissions/update');
    Route::post('roles/permissions/delete', 'deleteRolesPermissions')->middleware('auth')->name('roles/permissions/delete');
});

// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ----------------------------- lock screen --------------------------------//
Route::controller(LockScreen::class)->group(function () {
    Route::get('lock_screen','lockScreen')->middleware('auth')->name('lock_screen');
    Route::post('unlock', 'unlock')->name('unlock');    
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');    
});

// ----------------------------- reset password -----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');    
});

// ----------------------------- user profile ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('profile_user', 'profile')->middleware('auth')->name('profile_user');
    Route::post('profile/information/save', 'profileInformation')->name('profile/information/save');    
});

// ----------------------------- user userManagement -----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('userManagement', 'index')->middleware('auth')->name('userManagement');
    Route::post('user/add/save', 'addNewUserSave')->name('user/add/save');
    Route::post('search/user/list', 'searchUser')->name('search/user/list');
    Route::post('update', 'update')->name('update');
    Route::post('user/delete', 'delete')->middleware('auth')->name('user/delete');
    Route::get('activity/log', 'activityLog')->middleware('auth')->name('activity/log');
    Route::get('activity/login/logout', 'activityLogInLogOut')->middleware('auth')->name('activity/login/logout');    
});

// ----------------------------- search user management ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::post('search/user/list', 'searchUser')->name('search/user/list');
});

// ----------------------------- form change password ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('change/password', 'changePasswordView')->middleware('auth')->name('change/password');
    Route::post('change/password/db', 'changePasswordDB')->name('change/password/db');    
});

// ----------------------------- job ------------------------------//
Route::controller(JobController::class)->group(function () {
    Route::get('form/job/list','jobList')->name('form/job/list');
    Route::get('form/job/view', 'jobView')->name('form/job/view');    
});

// ----------------------------- form employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('all/employee/card', 'cardAllEmployee')->middleware('auth')->name('all/employee/card');
    Route::get('all/employee/list', 'listAllEmployee')->middleware('auth')->name('all/employee/list');
    Route::post('all/employee/save', 'saveRecord')->middleware('auth')->name('all/employee/save');
    Route::get('all/employee/view/edit/{employee_id}', 'viewRecord')->middleware('auth');
    Route::post('all/employee/update', 'updateRecord')->middleware('auth')->name('all/employee/update');
    Route::get('all/employee/delete/{employee_id}', 'deleteRecord')->middleware('auth');
    Route::post('all/employee/search', 'employeeSearch')->name('all/employee/search');
    Route::post('all/employee/list/search', 'employeeListSearch')->name('all/employee/list/search');    
    Route::get('form/departments/page', 'index')->middleware('auth')->name('form/departments/page');    
    Route::post('form/departments/save', 'saveRecordDepartment')->middleware('auth')->name('form/departments/save');    
    Route::post('form/department/update', 'updateRecordDepartment')->middleware('auth')->name('form/department/update');    
});

// ----------------------------- profile employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('employee/profile/{rec_id}', 'profileEmployee')->middleware('auth');
});

// ----------------------------- form holiday ------------------------------//
Route::controller(HolidayController::class)->group(function () {
    Route::get('form/holidays/new', 'holiday')->middleware('auth')->name('form/holidays/new');
    Route::post('form/holidays/save', 'saveRecord')->middleware('auth')->name('form/holidays/save');
    Route::post('form/holidays/update', 'updateRecord')->middleware('auth')->name('form/holidays/update');    
});

// ----------------------------- form leaves ------------------------------//
Route::controller(LeavesController::class)->group(function () {
    Route::get('form/leaves/new', 'leaves')->middleware('auth')->name('form/leaves/new');
    Route::get('form/leavesemployee/new', 'leavesEmployee')->middleware('auth')->name('form/leavesemployee/new');
    Route::post('form/leaves/save', 'saveRecord')->middleware('auth')->name('form/leaves/save');
    Route::post('form/leaves/edit', 'editRecordLeave')->middleware('auth')->name('form/leaves/edit');
    Route::post('form/leaves/edit/delete','deleteLeave')->middleware('auth')->name('form/leaves/edit/delete');    
});

// ----------------------------- form attendance  ------------------------------//
Route::controller(LeavesController::class)->group(function () {
    Route::get('form/leavesettings/page', 'leaveSettings')->middleware('auth')->name('form/leavesettings/page');
    Route::get('attendance/page', 'attendanceIndex')->middleware('auth')->name('attendance/page');
    Route::get('attendance/employee/page', 'AttendanceEmployee')->middleware('auth')->name('attendance/employee/page');
    Route::get('form/shiftscheduling/page', 'shiftScheduLing')->middleware('auth')->name('form/shiftscheduling/page');
    Route::get('form/shiftlist/page', 'shiftList')->middleware('auth')->name('form/shiftlist/page');    
});

// ----------------------------- form payroll  ------------------------------//
Route::controller(PayrollController::class)->group(function () {
    Route::get('form/salary/page', 'salary')->middleware('auth')->name('form/salary/page');
    Route::post('form/salary/save','saveRecord')->middleware('auth')->name('form/salary/save');
    Route::post('form/salary/update', 'updateRecord')->middleware('auth')->name('form/salary/update');
    Route::post('form/salary/delete', 'deleteRecord')->middleware('auth')->name('form/salary/delete');
    Route::get('form/salary/view/{rec_id}', 'salaryView')->middleware('auth');
    Route::get('form/payroll/items', 'payrollItems')->middleware('auth')->name('form/payroll/items');    
});

// ----------------------------- reports  ------------------------------//
Route::controller(ExpenseReportsController::class)->group(function () {
    Route::get('form/expense/reports/page', 'index')->middleware('auth')->name('form/expense/reports/page');
    Route::get('form/invoice/reports/page', 'invoiceReports')->middleware('auth')->name('form/invoice/reports/page');
    Route::get('form/invoice/view/page', 'invoiceView')->middleware('auth')->name('form/invoice/view/page');
    Route::get('form/daily/reports/page', 'dailyReport')->middleware('auth')->name('form/daily/reports/page');
    Route::get('form/leave/reports/page','leaveReport')->middleware('auth')->name('form/leave/reports/page');
});

// ----------------------------- performance  ------------------------------//
Route::controller(PerformanceController::class)->group(function () {
    Route::get('form/performance/indicator/page','index')->middleware('auth')->name('form/performance/indicator/page');
    Route::get('form/performance/page', 'performance')->middleware('auth')->name('form/performance/page');
    Route::get('form/performance/appraisal/page', 'performanceAppraisal')->middleware('auth')->name('form/performance/appraisal/page');
    Route::post('form/performance/indicator/save','saveRecordIndicator')->middleware('auth')->name('form/performance/indicator/save');
    Route::post('form/performance/indicator/delete','deleteIndicator')->middleware('auth')->name('form/performance/indicator/delete');
    Route::post('form/performance/indicator/update', 'updateIndicator')->middleware('auth')->name('form/performance/indicator/update');
    Route::post('form/performance/appraisal/save', 'saveRecordAppraisal')->middleware('auth')->name('form/performance/appraisal/save');
    Route::post('form/performance/appraisal/update', 'updateAppraisal')->middleware('auth')->name('form/performance/appraisal/update');
    Route::post('form/performance/appraisal/delete', 'deleteAppraisal')->middleware('auth')->name('form/performance/appraisal/delete');
});

// ----------------------------- training  ------------------------------//
Route::controller(TrainingController::class)->group(function () {
    Route::get('form/training/list/page','index')->middleware('auth')->name('form/training/list/page');
    Route::post('form/training/save', 'addNewTraining')->middleware('auth')->name('form/training/save');
    Route::post('form/training/delete', 'deleteTraining')->middleware('auth')->name('form/training/delete');
    Route::post('form/training/update', 'updateTraining')->middleware('auth')->name('form/training/update');    
});

// ----------------------------- trainers  ------------------------------//
Route::controller(TrainersController::class)->group(function () {
    Route::get('form/trainers/list/page', 'index')->middleware('auth')->name('form/trainers/list/page');
    Route::post('form/trainers/save', 'saveRecord')->middleware('auth')->name('form/trainers/save');
    Route::post('form/trainers/update', 'updateRecord')->middleware('auth')->name('form/trainers/update');
    Route::post('form/trainers/delete', 'deleteRecord')->middleware('auth')->name('form/trainers/delete');
});

// ----------------------------- training type  ------------------------------//
Route::controller(TrainingTypeController::class)->group(function () {
    Route::get('form/training/type/list/page', 'index')->middleware('auth')->name('form/training/type/list/page');
    Route::post('form/training/type/save', 'saveRecord')->middleware('auth')->name('form/training/type/save');
    Route::post('form//training/type/update', 'updateRecord')->middleware('auth')->name('form//training/type/update');
    Route::post('form//training/type/delete', 'deleteTrainingType')->middleware('auth')->name('form//training/type/delete');    
});

