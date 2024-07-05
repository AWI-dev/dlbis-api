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
Route::get('v1/inventory/title/get/all', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onGetAll']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('v1/run-migrations-and-seed', function () {
        // Artisan::call('migrate', ["--force" => true]);
        Artisan::call('migrate:fresh', ["--force" => true]);
        Artisan::call('db:seed', ["--force" => true]);
        return 'Migrations and Seed completed successfully!';
    });

    Route::post('v1/logout', [App\Http\Controllers\Auth\CredentialController::class, 'onLogout']);
    Route::post('v1/credential/create', [App\Http\Controllers\Auth\CredentialController::class, 'onCreate']);

    #region Inventory Title
    Route::post('v1/inventory/title/create', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onCreate']);
    Route::post('v1/inventory/title/update/{id}', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onUpdate']);
    Route::delete('v1/inventory/title/delete/{id}', [App\Http\Controllers\Inventory\InventoryTitleController::class, 'onDelete']);
    #endregion

    #region Inventory Title
    Route::post('v1/inventory/details/create', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onCreate']);
    Route::post('v1/inventory/details/update/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onUpdate']);
    Route::delete('v1/inventory/details/delete/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onDelete']);
    Route::get('v1/inventory/details/get/current/{employee_id}/{id}', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onGetCurrent']);
    Route::post('v1/inventory/details/bulk', [App\Http\Controllers\Inventory\InventoryDetailsController::class, 'onBulk']);
    #endregion
});
