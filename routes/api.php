<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController as ApiController;;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiController::class)->group(function () {
    Route::get('categories/get', 'get_category');
    Route::post('categories/add', 'add_category');
    Route::post('categories/update', 'update_category');
    Route::post('categories/delete', 'delete_category');

    Route::get('banner/get', 'get_banner');
    Route::post('banner/add', 'add_banner');
    Route::post('banner/update', 'update_banner');
    Route::post('banner/delete', 'delete_banner');

    Route::get('general_settings/get', 'get_general_settings');
    Route::post('general_settings/add', 'add_general_settings');
    Route::post('general_settings/update', 'update_general_settings');

    Route::get('product/get', 'get_products');
    Route::post('product/add', 'add_product');
    Route::post('product/update', 'update_product');
    Route::post('product/delete', 'delete_product');
    Route::post('product/singleById', 'search_product');
    Route::post('product/getProductsbycatId', 'search_product_cat');

    Route::get('total_purchase/get', 'get_purchase');
    Route::post('total_purchase/add', 'add_purchase');
    Route::post('total_purchase/update', 'update_purchase');
    Route::post('total_purchase/delete', 'delete_purchase');

    Route::get('admin/get', 'get_admin');
    Route::post('admin/add', 'add_admin');
    Route::post('admin/update', 'update_admin');
    Route::post('admin/delete', 'delete_admin');
    Route::post('admin/login', 'login');
});
