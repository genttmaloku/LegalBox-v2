<?php

use App\Http\Controllers\LawyerAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\MeetingsController;
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







//Front Authentication 
Route::view('/home','home')->name('home');
Route::view('login', 'lawyerlogin')->name('login');
Route::view('register','lawyerregister')->name('register');
Route::post('/lawyerregister', [LawyerAuthController::class, 'register'])->name('lawyer.register');
Route::post('/lawyerlogin', [LawyerAuthController::class, 'login'])->name('lawyer.login');
Route::post('/lawyerlogin', [LawyerAuthController::class, 'logout'])->name('lawyer.logout');

//Dashboard
Route::get('dashboard',[LawyerController::class,'dashboard']);

//Legal Cases
Route::get('/cases', [LegalCaseController::class,'index'])->name('cases');
Route::post('/cases',[LegalCaseController::class,'store'])->name('legalcases.store');
Route::delete('/cases/{id}',[LegalCaseController::class,'destroy'])->name('cases.delete');
Route::put('/cases/{id}',[LegalCaseController::class,'update'])->name('cases.update');
Route::post('/cases/{name}', [LegalCaseController::class, 'filter'])->name('cases.filter');
Route::get('/casessearch', [LegalCaseController::class, 'search'])->name('cases.search');

//Meetings
Route::post('/meetings',[MeetingsController::class,'store'])->name('meetings.store');
Route::get('meetings', [MeetingsController::class,'index'] )->name('meetings');
Route::put('/meetings/{id}',[MeetingsController::class,'update'])->name('meetings.update');
Route::post('/meetings/{name}', [MeetingsController::class, 'filter'])->name('meetings.filter');
Route::delete('/meetings/{id}',[MeetingsController::class,'destroy'])->name('meetings.delete');

//Clients
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients',[ClientController::class,'index'])->name('clients');
Route::get('/clientsearch', [ClientController::class, 'search'])->name('clients.search');
Route::post('/clients/{id}',[ClientController::class,'destroy'])->name('clients.delete');
Route::put('clients/{id}',[ClientController::class,'update'])->name('clients.update');
Route::delete('/clients/{id}',[ClientController::class,'destroy'])->name('clients.delete');

