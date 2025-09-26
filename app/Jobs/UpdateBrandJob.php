<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Dto\UpdateBrandJobDto;
use App\Models\Brand;

class UpdateBrandJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateBrandJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->id;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $brand = Brand::find($this->payload->id);
        if ($brand) {
            $brand->name = $this->payload->name;
            $brand->save();
        }
    }
}