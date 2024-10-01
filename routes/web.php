<?php

use App\Http\Controllers\Admin\Auth\ChangePassword;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPassword;
use App\Http\Controllers\Admin\ConsultController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;




Route::get('/', [LandingController::class, 'index']);

//send email
Route::get('/mail', [MailController::class, 'mailform']);
Route::post('/send-mail', [MailController::class, 'maildata'])->name('send_mail');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
    Route::delete('/emails/{email}', [EmailController::class, 'destroy'])->name('emails.destroy');
    Route::get('/emails/{email}', [EmailController::class, 'show'])->name('emails.show');
    Route::get('/consults', [ConsultController::class, 'index'])->name('consults.index');
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    Route::get('/support-replay/{support}', [SupportController::class, 'replay'])->name('support.replay');
    Route::post('/support/{support}', [SupportController::class, 'send'])->name('support.send');
    Route::delete('/support/{support}', [SupportController::class, 'destroy'])->name('support.destroy');
    Route::get('/support/{support}', [SupportController::class, 'show'])->name('support.show');
    Route::delete('/consults/{consult}', [ConsultController::class, 'destroy'])->name('consults.destroy');
    Route::get('/consults/{consult}', [ConsultController::class, 'show'])->name('consults.show');
    //roles
    Route::resource('roles', RoleController::class);
    //user
    Route::resource('users', UserController::class);
    //service
    Route::resource('services', ServiceController::class);
    //product
    Route::resource('products', ProductController::class);
    //client
    Route::resource('clients', ClientController::class);
});

Route::middleware('guest')->group(function () {
    //login
    Route::get('/dashboard', [LoginController::class, 'show'])->name('login');
    Route::post('/dashboard', [LoginController::class, 'login'])->name('login.perform');
    Route::post('logout', [LoginController::class, 'logout'])->withoutMiddleware('guest')->name('logout');
    //reset-password
    Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
    Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
    //change-password
    Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
    Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});
