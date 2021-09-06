<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SMSLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageDraftController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

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
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::group(['prefix'=>'admin'], function(){
    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin.login-form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');

    Route::group(['middleware'=> 'auth:admin'], function(){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        // Admin User CRUD
        Route::get('/users', [UserController::class, 'showUsers'])->name('admin.users');
        Route::post('/user/store', [UserController::class, 'store'])->name('admin.store-user');
        Route::get('/user/edit/{user}', [UserController::class, 'showEditForm'])->name('admin.edit-form');
        Route::post('/user/destroy/{user}', [UserController::class, 'destroy'])->name('admin.destroy-user');
        Route::post('/user/update/{user}', [UserController::class, 'update'])->name('admin.update-user');
        Route::post('/user/upload/excel', [UserController::class, 'uploadUsers'])->name('admin.upload-bulk-users');

        // Admin Mail Routes
        Route::get('/mail', [MailController::class, 'showMailForm'])->name('admin.mail');
        Route::post('/mail/send', [MailController::class, 'sendMail'])->name('admin.send-mail');

        //Admin Email Drafts
        Route::get('/drafts/edit', [MessageDraftController::class, 'showEditForm'])->name('admin.draft-edit');
        Route::post('/drfats/update', [MessageDraftController::class, 'update'])->name('admin.draft-update');

        //Admin SMS Logs
        Route::get('/sms/log', [SMSLogController::class, 'logs'])->name('admin.sms-logs');
    });
});

