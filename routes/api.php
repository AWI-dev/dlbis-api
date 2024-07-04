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
    Route::get('v1/inventory/title/get/all', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onGetAll']);
    #endregion
});
