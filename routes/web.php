<?php


use Illuminate\Support\Facades\Route;

// Frontend Controller
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;

// Backend Controller
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\PoliController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;

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

Route::resource('/', LandingController::class);

Route::group(
    ['middleware' => ['auth:sanctum', 'verified']],
    function () {
        // appointment page frontsite
        Route::resource('appointment', AppointmentController::class);

        // payment page frontsite
        Route::resource('payment', PaymentController::class);
    }
);

Route::group(
    ['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']],
    function () {

        Route::resource('dashboard', DashboardController::class);

        // Management access route
        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
        Route::resource('type-user', TypeUserController::class);
        Route::resource('user', UserController::class);

        // Master data route
        Route::resource('consultation', ConsultationController::class);
        Route::resource('poli-services-data', PoliController::class);
        Route::resource('cfg-payment', ConfigPaymentController::class);

        // Operational route route
        Route::resource('doctor', DoctorController::class);
        Route::resource('appointment-data', ReportAppointmentController::class);
        Route::resource('transaction-data', ReportTransactionController::class);
    }
);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
