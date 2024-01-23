<?php

use App\Http\Controllers\DocumentPermitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentMetadataController;
use App\Http\Controllers\MetadataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoricController;
use App\Http\Controllers\UserTypeController;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadFileController;

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



Route::get('/', function () {
    return view('welcome-pw');
})->name('inicio');

//main dashboard
Route::get('/dashboard/get-file-sizes', [DashboardController::class, 'getFileSizes'])->name('file-sizes');

Route::get('/dashboard', [DashboardController::class, 'index', 'getFileSizes']);


//register
Route::get('/auth/register', function(){
    return view('register');
});

Route::get('/shared-documents/{uuid}', [App\Http\Controllers\DocumentController::class, 'publicShow'])->name('documents.publicShow');




Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/users', UserController::class);

    Route::resource('/userTypes', UserTypeController::class);

    Route::resource('/historics', HistoricController::class);

    Route::resource('/documents', DocumentController::class);

    Route::resource('/departments', DepartmentController::class);

    Route::resource('/documentsPermitions', DocumentPermitionController::class);

    Route::resource('/documentMdatas', MetadataController::class);


    Route::resource('/documents', DocumentController::class);
    Route::get('/documents/{uuid}/share', [App\Http\Controllers\DocumentController::class, 'share'])->name('documents.share');
    Route::get('/documents/{document}/download', [App\Http\Controllers\DocumentController::class, 'download'])->name('documents.download');
    Route::get('/documents/{document}/edit', [App\Http\Controllers\DocumentController::class, 'edit'])->name('documents.edit');


    Route::resource('/Mdata', MetadataController::class);
});


//upload files
Route::resource('/uploadfile', \App\Http\Controllers\UploadFileController::class);


//send email
Route::get('/mail', [DocumentController::class, 'sendEmailsToUsers'])->name('emails.email');

/*

Route::get('/sendbasicemail',\App\Http\Controllers\MailController::class, 'basic_email');
Route::get('/sendhtmlemail',\App\Http\Controllers\MailController::class,'html_email');
Route::get('/sendattachmentemail',\App\Http\Controllers\MailController::class,'attachment_email');
*/






require __DIR__.'/auth.php';
