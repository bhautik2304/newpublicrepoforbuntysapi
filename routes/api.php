<?php

use App\Http\Controllers\{authcontroller, appointmentController, StafftypeController, StaffController, ServiceController, CostumerController, ServicetypeController, StoreController};
use App\Models\costumer;
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
Route::post('/login',[authcontroller::class,'login']);



Route::apiResource('/costomer', CostumerController::class);
Route::put('/costomer/{id}', [CostumerController::class,'update']);


Route::apiResource('/store', StoreController::class);
Route::put('/store/{id}', [StoreController::class,'update']);

// Route::apiResource('/appoitment', appointmentController::class);
// Route::put('/appoitment/{id}', [appointmentController::class,'update']);

Route::post('/bookAppoitment', [appointmentController::class, 'store']);

Route::apiResource('/stufftype', StafftypeController::class);
Route::apiResource('/stuff', StaffController::class);

Route::apiResource('/invoice', StaffController::class);

Route::apiResource('/Servicetype', ServicetypeController::class);
Route::apiResource('/Service', ServiceController::class);

Route::post('/costumertype', [CostumerController::class, 'costomertypes']);
Route::get('/costumertype', [CostumerController::class, 'costomer']);

Route::get('/test/{id}', function ($id,Request $req) {
    //$costomer= costumer::where('id', $id)->first();
    //return $costomer->sendSms($costomer->name,$costomer->mobaile);
    return date('d M y D', strtotime($req->date)) . ' ' . date('h:i A', strtotime($req->time));
});
