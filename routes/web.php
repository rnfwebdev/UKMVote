<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

//Voter page
Route::get('/', [VoterController::class, 'Index'])->name('index');
//Voter Group Middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

//jpmppLoginpage

//candidateLoginpage

//voterLoginpage
