<?php

namespace App\Providers;

use Illuminate\Console\Events\ScheduledTaskStarting;
use Illuminate\Console\Events\ScheduledTaskFinished;
use Illuminate\Console\Events\ScheduledTaskFailed;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobQueued;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Event;
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
        
        // Queue logs

        Event::listen(JobQueued::class, function (JobQueued $e) {
            Log::info('job_queued', [
                'app' => env('APP_NAME'),
                'environment' => config('app.env'),
                'job' => $e->job::class,
                'queue' => $e->queue,
                'delay' => $e->delay,
                'queued_at' => now()->toISOString(),
            ]);
        });

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

        // Scheduling logs

        Event::listen(ScheduledTaskStarting::class, function (ScheduledTaskStarting $e) {
            Log::info('scheduled_task_starting', [
                'app' => env('APP_NAME'),
                'task' => $e->task->getSummaryForDisplay(),
                'command' => $e->task->command,
                'description' => $e->task->description,
                'expression' => $e->task->getExpression(),
                'timezone' => $e->task->timezone,
                'started_at' => now()->toISOString(),
            ]);
        });

        Event::listen(ScheduledTaskFinished::class, function (ScheduledTaskFinished $e) {
            Log::info('scheduled_task_finished', [
                'app' => env('APP_NAME'),
                'task' => $e->task->getSummaryForDisplay(),
                'command' => $e->task->command,
                'runtime' => $e->runtime . 'ms',
                'finished_at' => now()->toISOString(),
            ]);
        });

        Event::listen(ScheduledTaskFailed::class, function (ScheduledTaskFailed $e) {
            Log::error('scheduled_task_failed', [
                'app' => env('APP_NAME'),
                'task' => $e->task->getSummaryForDisplay(),
                'command' => $e->task->command,
                'exception' => $e->exception->getMessage(),
                'exception_class' => get_class($e->exception),
                'file' => $e->exception->getFile(),
                'line' => $e->exception->getLine(),
                'failed_at' => now()->toISOString(),
            ]);
        });

    }
}
