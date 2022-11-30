<?php

use App\Http\Controllers\{authcontroller, appointmentController, StafftypeController, StaffController, ServiceController, CostumerController, ServicetypeController, StoreController,InvoiceController};
use App\Models\store;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/costomer', CostumerController::class);
Route::apiResource('/store', StoreController::class);

Route::apiResource('/stufftype', StafftypeController::class);
Route::apiResource('/stuff', StaffController::class);

Route::post('/createinvoice', [InvoiceController::class,'invoiceCreate']);

Route::apiResource('/Servicetype', ServicetypeController::class);
Route::apiResource('/Service', ServiceController::class);

Route::post('/costumertype', [CostumerController::class, 'costomertypes']);
Route::get('/costumertype', [CostumerController::class, 'costomer']);

Route::post('test', function (Request $req) {
    # code...
    return response(['store'=>store::where('id',1)->get()],200);
});
// Route::apiResource('/appointment', appointmentController::class);

// Route::post('/auth', [authcontroller::class]);
