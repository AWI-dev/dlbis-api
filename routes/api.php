<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('v1/login', [App\Http\Controllers\Auth\CredentialController::class, 'onLogin']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('v1/logout', [App\Http\Controllers\Auth\CredentialController::class, 'onLogout']);

    #region Inventory Title
    Route::post('v1/inventory/title/create', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onCreate']);
    Route::post('v1/inventory/title/update/{id}', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onUpdate']);
    Route::delete('v1/inventory/title/delete/{id}', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onDelete']);
    Route::get('v1/inventory/title/get/all', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onGetAll']);
    #endregion

    #region Inventory Title
    Route::post('v1/inventory/details/create', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onCreate']);
    Route::post('v1/inventory/details/update/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onUpdate']);
    Route::delete('v1/inventory/details/delete/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onDelete']);
    Route::get('v1/inventory/details/get/current/{employee_id}/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onGetCurrent']);
    #endregion
});
