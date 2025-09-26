<?php

namespace App\Jobs;

use App\Dto\CreateBrandJobDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Models\Brand;

class CreateBrandJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateBrandJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $brand = new Brand();
        $brand->name = $this->payload->name;
        $brand->save();
    }
}
