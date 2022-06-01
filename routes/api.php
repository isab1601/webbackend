<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OfferController;
use \App\Http\Controllers\SubjectController;
use \App\Http\Controllers\UserController;
use \App\Http\Models\Offer;
use \App\Http\Models\Subject;

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
//Authentification
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//return all subjects
Route::get('subjects',[SubjectController::class,'index']);

//search for subjects
Route::get('subjects/{subid}',[SubjectController::class,'findByID']);

//search for user
Route::get('users/{userid}',[UserController::class,'findByID']);

//return all offers
Route::get('offers',[OfferController::class,'index']);

//return all Messages from certain offer
Route::get('messages/{offerId}',[MessageController::class,'allbyOfferID']);

//return all Offers from certain user
Route::get('offers/user/{userId}',[OfferController::class,'OffersbyUserID']);

//return all Appointments from certain user
Route::get('appointments/{userId}',[AppointmentController::class,'allbyUserID']);

//find Offer by Id
Route::get('offers/{id}',[OfferController::class,'findByID']);

//find Appointment by Id
Route::get('appointments/{id}',[AppointmentController::class,'findByID']);

//Data that needs Authentification
Route::group(['middleware' => ['api','auth.jwt']], function() {
    //Add new offer
        Route::post('offers', [OfferController::class, 'save']);

    //Change offer
        Route::put('offers/{id}', [OfferController::class, 'update']);

    //Add new comment
    Route::post('messages', [MessageController::class, 'save']);

    //Delete message
    Route::delete('messages/{id}', [MessageController::class, 'delete']);

    //Delete appointment
    Route::delete('appointments/{id}', [AppointmentController::class, 'delete']);

    //book Appointment
    Route::put('appointments/update/{id}', [AppointmentController::class, 'updateAppointment']);

    //delete offer
        Route::delete('offers/{id}', [OfferController::class, 'delete']);

    //logout
    Route::post('auth/logout', [AuthController::class,'logout']);
});

//login
Route::post('auth/login', [AuthController::class,'login']);










