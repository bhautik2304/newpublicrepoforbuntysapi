<?php

use App\Http\Controllers\appointmentController;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CostomercateguryController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\productbrands;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProducttypesController;
use App\Http\Controllers\RoletypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicetypeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StafftypeController;
use App\Http\Controllers\StorecloseController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StorenotifyController;
use App\Http\Controllers\StorenotyficationcateguryController;
use App\Http\Controllers\StorenotyficationController;
use App\Http\Controllers\StoreoffdayController;
use App\Http\Controllers\vauchercontroller;
use App\Http\Controllers\vauchertypecontroller;
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
// Auth Routes & Management
Route::post('/login', [authcontroller::class, 'login']);
Route::post('/logout/{id}', [authcontroller::class, 'logout']);
Route::post('/resetpasswordrequst', [authcontroller::class, 'resetPasswordRequst']);
Route::post('/resetpasswordcheckotp', [authcontroller::class, 'checkOtp']);
Route::post('/resetpassword', [authcontroller::class, 'resetPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// role Managment & crud Opration Routes
Route::post('/createrole', [RoletypeController::class, 'createRole']);
Route::post('/givepermisson', [RoletypeController::class, 'givePermissions']);

// invoice Management & Crud Opration Hear
Route::post('/createinvoice', [InvoiceController::class, 'invoiceGenrater']);
Route::post('/invoice', [InvoiceController::class, 'getInvoice']);

// costomer Opration Routes Hear
Route::apiResource('/costomer', CostumerController::class);
Route::apiResource('/costumertype', CostomercateguryController::class);
Route::put('/costomer/emailNotification/{id}', [CostumerController::class, 'emailNotification']);
Route::put('/costomer/mobaileNotification/{id}', [CostumerController::class, 'mobaileNotification']);
Route::put('/costomer/whatsappNotification/{id}', [CostumerController::class, 'whatsappNotification']);
Route::put('/costomer/promo_smsNotification/{id}', [CostumerController::class, 'promo_smsNotification']);

// store Management & Opration Hear
Route::apiResource('/store', StoreController::class);
Route::put('/updatetime/{id}', [StoreController::class, 'updateStoreTime']);

// Appointment Routes & management
Route::apiResource('/appoitment', appointmentController::class);
Route::post('/appoitment', [appointmentController::class, 'store']);
Route::put('/appoitment', [appointmentController::class, 'update']);

// product Mangement
Route::apiResource('/product', ProductController::class);
Route::apiResource('/producttype', ProducttypesController::class);
Route::apiResource('/productbrand', productbrands::class);

// voucher Mangement
Route::apiResource('/vouchertype', vauchertypecontroller::class);
Route::apiResource('/voucher', vauchercontroller::class);

// stuff Mangement
Route::apiResource('/stufftype', StafftypeController::class);
Route::apiResource('/stuff', StaffController::class);

// service & Resources Mangement Routes
Route::apiResource('/Servicetype', ServicetypeController::class);
Route::apiResource('/Service', ServiceController::class);

// Expanse mange ment routes

// Report Routes Management

// notification Routes Management
Route::apiResource('/notification', StorenotyficationController::class);
Route::apiResource('/notificationcatygury', StorenotyficationcateguryController::class);
// closing Date Routes Management
Route::apiResource('/time', StorecloseController::class);
Route::apiResource('/closingdate', StoreoffdayController::class);

// Report Routes Management
Route::apiResource('/city', CityController::class);

Route::apiResource('/notyfy', StorenotifyController::class);

// Inventury Mange ment Routes
Route::get('/test', function (Request $req) {

    return 404;
});
