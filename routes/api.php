<?php

use App\Http\Controllers\LawyerAuthController;
use App\Http\Controllers\LawFirmAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\LegalCaseController;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);

// Public routes





//API Authentication 
Route::view('/home','home');
Route::view('login', 'lawyerlogin');
Route::view('register','lawyerregister');
Route::post('/lawyerregister', [LawyerAuthController::class, 'register']);
Route::post('/lawyerlogin', [LawyerAuthController::class, 'login'])->name('lawyer.login');

//Dashboard


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('dashboard',[LawyerController::class,'dashboard']);

//Legal Cases
Route::get('/cases', [LegalCaseController::class,'index']);
Route::post('/cases',[LegalCaseController::class,'store']);
Route::delete('/cases/{id}',[LegalCaseController::class,'destroy']);
Route::put('/cases/{id}',[LegalCaseController::class,'update']);
Route::post('/cases/{name}', [LegalCaseController::class, 'filter']);
Route::get('/casessearch', [LegalCaseController::class, 'search']);

//Meetings
Route::post('/meetings',[MeetingsController::class,'store']);
Route::get('meetings', [MeetingsController::class,'index'] );
Route::put('/meetings/{id}',[MeetingsController::class,'update']);
Route::post('/meetings/{name}', [MeetingsController::class, 'filter']);
Route::delete('/meetings/{id}',[MeetingsController::class,'destroy']);

//Clients
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clientsearch', [ClientController::class, 'search']);
Route::post('/clients/{id}',[ClientController::class,'destroy']);
Route::put('clients/{id}',[ClientController::class,'update']);
Route::delete('/clients/{id}',[ClientController::class,'destroy']);

    Route::post('/lawyerlogout', [LawyerAuthController::class, 'logout'])->name('lawyer.logout');


   






Route::post('/clients',[ClientController::class,'store'])->name('clients.store');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});