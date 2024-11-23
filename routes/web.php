<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WarningController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

Route::get('/privacy', [HomeController::class, 'privacy'])->name('admin');

Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

Route::get('/engineer', [HomeController::class, 'engineer'])->name('engineer');

Route::get('/not_owner', [HomeController::class, 'not_owner'])->name('not_owner');

Route::get('/current', [HomeController::class, 'current'])->name('current');

Route::get('/unapproved', [HomeController::class, 'unapproved'])->name('unapproved');


/** Welcome */
Route::get('/menu', [WelcomeController::class, 'menu'])->name('welcome.menu');

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

/** Warning Pages */
Route::get('/warnings/admin', [WarningController::class, 'admin'])->name('warnings.admin');

/** API Pages */
Route::get('/api_admin', [ApiTokenController::class, 'admin'])->name('api_admin')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/api_admin/manage', [ApiTokenController::class, 'manage'])->name('api_admin.manage')->middleware(['admin', 'auth', 'verified', 'approved']);

/** Client Controller */
Route::get('/clients', [ClientController::class, 'index'])->name('clients')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::patch('/clients/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware(['admin', 'auth', 'verified', 'approved']);


/** User Controller */
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/users/auth', [UserController::class, 'auth'])->name('users.auth')->middleware(['admin', 'auth', 'verified']);
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete')->middleware(['admin', 'auth', 'verified', 'approved']);
Route::get('/users/unauth/{user}', [UserController::class, 'un_auth'])->name('users.un_auth')->middleware(['admin', 'auth', 'verified', 'approved']);


/** Inspection Controller */
Route::get('/inspections', [InspectionController::class, 'index'])->name('inspections')->middleware(['auth', 'verified', 'approved', 'approved']);
Route::get('/inspections/{client}/index', [InspectionController::class, 'index'])->name('inspections.index_by_client')->middleware
(['auth', 'verified', 'approved']);
Route::post('/inspections/search_by_job_number', [InspectionController::class, 'search_by_job_number'])->name('inspections.search_by_job_number')->middleware
(['auth', 'verified', 'approved']);
Route::get('/inspections/index', [InspectionController::class, 'by_client'])->name('inspections.by_client')->middleware(['auth', 'verified', 'approved', 'approved']);
Route::get('/inspections/{inspection}', [InspectionController::class, 'show'])->name('inspections.show')->middleware
(['owns_inspection', 'auth', 'verified', 'approved']);
Route::delete('/inspections/delete', [InspectionController::class, 'delete'])->name('inspection.delete');

/** Document Controller */
Route::get('/documents/create/{inspection}', [DocumentController::class, 'create'])->name('documents.create')
    ->middleware(['engineer', 'auth', 'verified', 'approved']);
Route::post('/documents/{inspection}', [DocumentController::class, 'upload'])->name('documents.upload')->middleware(['engineer', 'auth', 'verified', 'approved']);
Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download')->middleware
(['owns_document', 'auth', 'verified', 'approved']);
Route::delete('/documents/delete/{document}', [DocumentController::class, 'delete'])->name('documents.delete')->middleware(['admin', 'auth', 'verified', 'approved']);

/** Picture Controller */
Route::get('/pictures/{id}/{picture}', [PictureController::class, 'show'])->name('pictures.show')->middleware(['owns_picture', 'auth', 'verified', 'approved']);
Route::delete('/pictures/{picture}', [PictureController::class, 'delete'])->name('pictures.delete')->middleware(['owns_picture', 'auth', 'verified', 'approved']);
Route::get('/pictures/edit_comment/{picture}/{inspection}', [PictureController::class, 'edit_comment'])->name('pictures.edit_comment')->middleware(['engineer', 'auth', 'verified', 'approved']);
Route::patch('/pictures/update_comment/{picture}/{inspection}', [PictureController::class, 'update_comment'])->name('pictures.update_comment')->middleware(['engineer', 'auth', 'verified', 'approved']);
Route::get('/pictures/upload/{inspection}/{answer}', [PictureController::class, 'upload'])->name('pictures.upload')
    ->middleware(['engineer', 'auth', 'verified', 'approved']);
Route::post('/pictures/upload/{inspection}/{answer}', [PictureController::class, 'store'])->name('pictures.store')
    ->middleware(['engineer', 'auth', 'verified', 'approved']);

/** PDFController */
Route::get('/pdfs/checklist/{inspection}', [PDFController::class, 'pdf_checklist'])->name('pdfs.pdf_checklist')
    ->middleware(['owns_inspection', 'auth', 'verified', 'approved']);
Route::get('/pdfs/tables/{inspection}', [PDFController::class, 'pdf_tables'])->name('pdfs.pdf_tables')
    ->middleware(['owns_inspection', 'auth', 'verified', 'approved']);

/** AnswerController */
Route::get('/answers/{answer}', [AnswerController::class, 'edit'])->name('answers.edit')->middleware(['engineer', 'auth', 'approved']);


/** Setup Route */
Route::get('/setup', [SetupController::class, 'index'])->name('setup')->middleware('admin');
Route::get('/setup/sections', [SectionController::class, 'index'])->name('setup.sections')->middleware('admin');
Route::get('/setup/questions', [QuestionController::class, 'index'])->name('setup.questions')->middleware('admin');
Route::get('/setup/questions/{section}/show', [QuestionController::class, 'show'])->name('setup.questions.show')->middleware('admin');
