<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Retry failed jobs in SQS queue
Schedule::command('queue:retry all')->everyFiveMinutes()->withoutOverlapping()->onOneServer();

// Delete tags not attached to any product
Schedule::call(function () {
    DB::table('tags')
        ->whereNotIn('id', function ($query) {
            $query->select('tag_id')->from('product_tags');
        })
        ->delete();
})->dailyAt('00:00')->name('delete-unused-tags');

// Delete images not attached to any product variation
Schedule::call(function () {
    DB::table('images')
        ->whereNotIn('id', function ($query) {
            $query->select('image_id')->from('product_variation_images');
        })
        ->delete();
})->dailyAt('00:00')->name('delete-unused-images');

// Delete colors not attached to any product variation
Schedule::call(function () {
    DB::table('colors')
        ->whereNotIn('id', function ($query) {
            $query->select('color_id')->from('product_variations');
        })
        ->delete();
})->dailyAt('00:00')->name('delete-unused-colors');