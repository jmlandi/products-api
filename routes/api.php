<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\TagController;

Route::controller(BrandController::class)->middleware('api.token')->group(function () {
    Route::post('/brands', 'store');
    Route::post('/brands/update-name', 'updateName');
});

Route::controller(ColorController::class)->middleware('api.token')->group(function () {
    Route::post('/colors', 'store');
    Route::post('/colors/update-name', 'updateName');
});

Route::controller(TagController::class)->middleware('api.token')->group(function () {
    Route::post('/tags', 'store');
    Route::post('/tags/update-name', 'updateName');
});

Route::controller(ProductController::class)->middleware('api.token')->group(function () {
    Route::post('/products', 'store');
    Route::post('/products/update-availability', 'updateProductAvailability');
    Route::post('/products/update-brand', 'updateProductsBrand');
    Route::post('/products/update-sku', 'updateProductsSku');
    Route::post('/products/update-name', 'updateProductsName');
    Route::post('/products/update-description', 'updateProductsDescription');
    Route::post('/products/update-price', 'updateProductsPrice');
    Route::post('/products/attach-tag', 'attachProductsTags');
    Route::post('/products/detach-tag', 'detachProductsTags');
});

Route::controller(ProductVariationController::class)->middleware('api.token')->group(function () {
    Route::post('/product-variations/update-stock', 'updateStock');
    Route::post('/product-variations/update-color', 'updatePrice');
    Route::post('/product-variations/update-size', 'updateSize');
    Route::post('/product-variations/attach-image', 'attachImage');
    Route::post('/product-variations/detach-image', 'detachImage');
});