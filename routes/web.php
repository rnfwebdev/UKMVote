<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VoterController;
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

Route::POST('/otp/request', [AuthenticatedSessionController::class, 'OTPRequest'])->name('otp.request');

//Voter page
Route::get('/', [VoterController::class, 'Index'])->name('index');
//Voter Group Middleware
Route::get('/dashboard', function () {
    return view('voter.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //voter logout
    Route::get('/logout', [VoterController::class, 'VoterLogout'])->name('voter.logout');
    //page route
    Route::get('/profile', [VoterController::class, 'VoterProfile'])->name('voter.profile');
    Route::get('/edit/profile', [VoterController::class, 'VoterEditProfile'])->name('voter.edit.profile');
    //data route
    Route::POST('/store/profile', [VoterController::class, 'VoterStoreProfile'])->name('voter.store.profile');

}); //End of VOTER group middleware

require __DIR__.'/auth.php';

//ADMIN Group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){

    //redirect to admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    // admin logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    //page route
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    //data route
    Route::POST('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::POST('/admin/update/password', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
    }); //End of ADMIN group middleware


//JPMPP Group Middleware
Route::middleware(['auth','roles:jpmpp'])->group(function(){
    //refer to admin route. sama je
    //redirect to jpmpp dashboard

    //jpmpp logout

    //page route

    //data route

    }); //End of JPMPP group middleware


//Candidate Group Middleware
Route::middleware(['auth','roles:candidate'])->group(function(){
    //refer to admin route. sama je
    //redirect to candidate dashboard

    //candidate logout

    //page route

    //data route

    }); //End of Candidate group middleware



//adminLoginpage
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/loginotp', [AuthenticatedSessionController::class, 'loginWithOtp'])->name('login.otp');


//jpmppLoginpage

//candidateLoginpage

//voterLoginpage
