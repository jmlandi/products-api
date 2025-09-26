<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\TagController;

Route::controller(BrandController::class)->middleware('api.token')->group(function () {
    Route::post('/brands', 'store');
    Route::patch('/brands/update-name', 'updateName');
});

Route::controller(ColorController::class)->middleware('api.token')->group(function () {
    Route::post('/colors', 'store');
    Route::patch('/colors/update-name', 'updateName');
});

Route::controller(TagController::class)->middleware('api.token')->group(function () {
    Route::post('/tags', 'store');
    Route::patch('/tags/update-name', 'updateName');
});

Route::controller(ImageController::class)->middleware('api.token')->group(function () {
    Route::post('/images', 'store');
    Route::patch('/images/update-alt-text', 'updateAltText');
});

Route::controller(ProductController::class)->middleware('api.token')->group(function () {
    Route::post('/products', 'store');
    Route::patch('/products/update-availability', 'updateAvailability');
    Route::patch('/products/update-brand', 'updateBrand');
    Route::patch('/products/update-sku', 'updateSku');
    Route::patch('/products/update-name', 'updateName');
    Route::patch('/products/update-description', 'updateDescription');
    Route::patch('/products/update-price', 'updatePrice');
    Route::patch('/products/attach-tag', 'attachTag');
    Route::patch('/products/detach-tag', 'detachTag');
});

Route::controller(ProductVariationController::class)->middleware('api.token')->group(function () {
    Route::post('/product-variations', 'store');
    Route::patch('/product-variations/update-availability', 'updateAvailability');
    Route::patch('/product-variations/update-child-sku', 'updateChildSku');
    Route::patch('/product-variations/update-stock', 'updateStock');
    Route::patch('/product-variations/update-color', 'updateColor');
    Route::patch('/product-variations/update-size', 'updateSize');
    Route::patch('/product-variations/attach-image', 'attachImage');
    Route::patch('/product-variations/detach-image', 'detachImage');
});