<?php

namespace App\Jobs;

use App\Dto\UpdateProductAvailabilityJobDto;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Models\Product;

class UpdateProductAvailabilityJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductAvailabilityJobDto $payload) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        if ($product)
        {
            $product->is_active = $this->payload->is_active;
            $product->save();
        }
    }
}
