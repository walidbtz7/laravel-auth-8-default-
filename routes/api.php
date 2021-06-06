<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('countcat', [ProductController::class, 'categories']);
    Route::get('countprod', [ProductController::class, 'products']);
    Route::get('categories', [ProductController::class, 'getGategories']);
    Route::get('contact', [ProductController::class, 'contact']);

});

