<?php

use App\Http\Controllers\{authcontroller, appointmentController, StafftypeController, StaffController, ServiceController, CostumerController, InvoiceController, RoletypeController, ServicetypeController, StoreController};
use App\Mail\testmail;
use App\Models\store;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
// Auth Routes & Management
Route::post('/login',[authcontroller::class,'login']);
Route::post('/resetpasswordrequst',[authcontroller::class,'resetPasswordRequst']);
Route::post('/resetpasswordcheckotp',[authcontroller::class,'checkOtp']);
Route::post('/resetpassword',[authcontroller::class,'resetPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// role Managment & crud Opration Routes
Route::post('/createrole',[RoletypeController::class,'createRole']);
Route::post('/givepermisson',[RoletypeController::class,'givePermissions']);


// invoice Management & Crud Opration Hear
Route::post('/createinvoice', [InvoiceController::class, 'invoiceGenrater']);
Route::post('/invoice', [InvoiceController::class, 'getInvoice']);


// costomer Opration Routes Hear
Route::apiResource('/costomer', CostumerController::class);
Route::put('/costomer/{id}', [CostumerController::class,'update']);
Route::post('/costumertype', [CostumerController::class, 'costomertypes']);
Route::get('/costumertype', [CostumerController::class, 'costomer']);

// store Management & Opration Hear
Route::resource('/store', StoreController::class);
Route::put('/store/{id}', [StoreController::class,'update']);


// Appointment Routes & management
Route::apiResource('/appoitment', appointmentController::class);
Route::post('/appoitment', [appointmentController::class,'store']);
Route::put('/appoitment', [appointmentController::class,'update']);


// stuff Mangement
Route::apiResource('/stufftype', StafftypeController::class);
Route::apiResource('/stuff', StaffController::class);



// service & Resources Mangement Routes
Route::apiResource('/Servicetype', ServicetypeController::class);
Route::apiResource('/Service', ServiceController::class);

// Expanse mange ment routes

// Report Routes Management


// Inventury Mange ment Routes
Route::get('/test', function (Request $req) {

  return  Mail::to($req->email)->send(new testmail(rand(0000,9999)));
});
