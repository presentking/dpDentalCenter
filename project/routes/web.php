<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\PatientRegisterController;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RerocrdAdminController;
use App\Http\Controllers\ScheduleAdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SpecializationUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [SpecializationController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route for users

Route::prefix('users')->group(function (){
    Route::controller(UserController::class)->group(function(){
        Route::get('/show', 'show')->name('user.show');
        Route::get('/index', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
        Route::post('/storeSpec/{id}', 'storeSpec')->name('user.storeSpec');
        Route::get('/edit/{id}', 'edit')->name('user.edit');
        Route::put('/update/{id}', 'update')->name('user.update');
        Route::delete('/delete/{id}', 'delete')->name('user.delete');
        Route::delete('/destroy/{id}', 'destroy')->name('user.destroy');
    });
});


//Route for service
Route::prefix('/services')->group(function (){
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/show', 'show')->name('service.show');
        Route::get('/index', 'index')->name('service.index');
        Route::get('/edit', 'edit')->name('service.edit');
        Route::post('/store', 'store')->name('service.store');
        Route::put('/update/{id}', 'update')->name('service.update');
        Route::delete('/destroy/{id}', 'destroy')->name('service.destroy');
    });
});


//Route for category

Route::prefix('/specialization')->group(function (){
   Route::controller(SpecializationController::class)->group(function (){
     Route::get('/index', 'index')->name('specialization.index');
     Route::post('/store', 'store')->name('specialization.store');
     Route::put('/update/{id}', 'update')->name('specialization.update');
     Route::delete('/destroy/{id}', 'destroy')->name('specialization.destroy');
   });
});

//Route specialization user
Route::prefix('/specializationUser')->group(function (){
    Route::controller(SpecializationUserController::class)->group(function (){
        Route::get('/index', 'index')->name('specializationUser.index');
        Route::post('/store', 'store')->name('specializationUser.store');
        Route::delete('/destroy/{id}', 'destroy')->name('specializationUser.destroy');
    });
});

//Route patient

Route::middleware('guest')->prefix('/patient')->group(function (){
    Route::get('/register', [PatientRegisterController::class, 'register']);
    Route::post('/register', [PatientRegisterController::class, 'store'])->name('patient.register');
    Route::get('/login', [PatientAuthController::class, 'login'])->name('patient.login');
    Route::post('/login', [PatientAuthController::class, 'store'])->name('patient.store');
    Route::post('logout', [PatientAuthController::class, 'logout'])->name('patient.logout');
});

//Route patient admin
Route::prefix('/patient')->group(function (){
    Route::controller(PatientController::class)->group(function(){
        Route::get('/index', 'index')->name('patient.index');
        Route::put('/update', 'update')->name('patient.update')->middleware('guest');
        Route::get('/show', 'show')->name('patient.show');
        Route::post('/store', 'store')->name('patient.admin.store');
        Route::put('/edit/{id}', 'edit')->name('patient.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('patient.destroy');
    });
});

//Route for schedule

Route::prefix('/schedule')->group(function(){
    Route::controller(ScheduleController::class)->group(function(){
        Route::get('/index',  'index')->name('schedule.index');
        Route::get('/edit/{id}', 'edit')->name('schedule.edit');
        Route::get('/store/{id}', 'store')->name('schedule.store');
        Route::get('/show/{id}', 'show')->name('schedule.show');
        Route::post('/create', 'create')->name('schedule.create');
    });
});

//Route for admin schedule
Route::prefix('/schedule/admin')->group(function (){
    Route::controller(ScheduleAdminController::class)->group(function (){
        Route::get('/create/{id}', 'create')->name('schedule.admin.create');
        Route::post('//{id}', 'store')->name('schedule.admin.store');
    });
});

//Route for record
Route::prefix('/record')->group(function(){
    Route::controller(RecordController::class)->group(function(){
        Route::get('/index', 'index')->name('record.index');
        Route::get('/create/{id}', 'create')->name('record.create');
        Route::get('/show', 'show')->name('record.show');
        Route::post('/store', 'store')->name('record.store');
        Route::delete('/destroy/{id}', 'destroy')->name('record.destroy');

    });
});

//Route for admin record
Route::prefix('/record/admin')->group(function (){
    Route::controller(RerocrdAdminController::class)->group(function (){
        Route::get('/index', 'index')->name('record.admin.index');
        Route::put('/edit/{id}', 'edit')->name('record.admin.edit');
        Route::delete('/destroy/{id}', 'destroy')->name('record.admin.destroy');
    });
});



Route::controller(AdminController::class)->group(function(){
    Route::get('/show/admin/panel', 'show')->name('admin.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
