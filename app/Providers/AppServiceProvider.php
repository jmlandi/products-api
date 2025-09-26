<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Queue::before(function (JobProcessing $e) {
            Log::info('job_processing', [
                'app' => env('APP_NAME'),
                'job' => $e->job->resolveName(),
                'job_id' => $e->job->getJobId(),
                'attempts' => $e->job->attempts(),
            ]);
        });

        Queue::after(function (JobProcessed $e) {
            Log::info('job_processed', [
                'app' => env('APP_NAME'),
                'job' => $e->job->resolveName(),
                'job_id' => $e->job->getJobId(),
                'attempts' => $e->job->attempts(),
            ]);
        });

        Queue::failing(function (JobFailed $e) {
            Log::error('job_failed', [
                'app' => env('APP_NAME'),
                'job' => $e->job->resolveName(),
                'job_id' => $e->job->getJobId(),
                'attempts' => $e->job->attempts(),
                'exception' => $e->exception->getMessage(),
            ]);
        });
    }
}
