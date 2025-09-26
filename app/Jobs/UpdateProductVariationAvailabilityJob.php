<?php

namespace App\Jobs;

use App\Dto\UpdateProductVariationAvailabilityJobDto;
use App\Models\ProductVariation;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductVariationAvailabilityJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductVariationAvailabilityJobDto $payload) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        if ($productVariation)
        {
            $productVariation->is_active = $this->payload->is_active;
            $productVariation->save();
        }
    }
}
