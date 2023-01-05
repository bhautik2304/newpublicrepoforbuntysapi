<?php

<<<<<<< HEAD
use App\Http\Controllers\{authcontroller, appointmentController, StafftypeController, StaffController, ServiceController, CostumerController, ServicetypeController, StoreController,InvoiceController};
=======
use App\Http\Controllers\{authcontroller, appointmentController, StafftypeController, StaffController, ServiceController, CostumerController, InvoiceController, RoletypeController, ServicetypeController, StoreController};
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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
<<<<<<< HEAD
Route::apiResource('/store', StoreController::class);

Route::apiResource('/stufftype', StafftypeController::class);
Route::apiResource('/stuff', StaffController::class);

Route::post('/createinvoice', [InvoiceController::class,'invoiceCreate']);

Route::apiResource('/Servicetype', ServicetypeController::class);
Route::resource('/Service', ServiceController::class);
Route::put('/Service/{id}', [ServiceController::class,'update']);

Route::post('/costumertype', [CostumerController::class, 'costomertypes']);
Route::get('/costumertype', [CostumerController::class, 'costomer']);

Route::post('test', function (Request $req) {
    # code...
    return response(['store'=>store::where('id',1)->get()],200);
});
// Route::apiResource('/appointment', appointmentController::class);
=======
Route::put('/costomer/{id}', [CostumerController::class,'update']);
Route::post('/costumertype', [CostumerController::class, 'costomertypes']);
Route::get('/costumertype', [CostumerController::class, 'costomer']);

// store Management & Opration Hear
Route::resource('/store', StoreController::class);
Route::put('/store/{id}', [StoreController::class,'update']);

>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df

// Appointment Routes & management
Route::apiResource('/appoitment', appointmentController::class);
Route::post('/appoitment', [appointmentController::class,'store']);


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
    //$costomer= costumer::where('id', $id)->first();
    //return $costomer->sendSms($costomer->name,$costomer->mobaile);
    // return $req->date ? $req->date : date("Y-m-d") ;
});
