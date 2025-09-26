<?php

namespace App\Jobs;

use App\Dto\DetachProductVariationImagesJobDto;
use App\Models\Image;
use App\Models\ProductVariation;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DetachProductVariationImagesJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public DetachProductVariationImagesJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->image_id . $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        $image = Image::find($this->payload->image_id);
        if ($productVariation && $image)
        {
            $productVariation->images()->detach($image->id);
        }
    }
}
