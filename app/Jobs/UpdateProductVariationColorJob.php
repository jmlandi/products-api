<?php

namespace App\Jobs;

use App\Dto\UpdateProductVariationColorJobDto;
use App\Models\Color;
use App\Models\ProductVariation;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductVariationColorJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductVariationColorJobDto $payload) { }

    public function objectId()
    {
        return $this->payload->color_id . $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        $color = Color::find($this->payload->color_id);
        if ($productVariation && $color)
        {
            $productVariation->color_id = $color->id;
            $productVariation->save();
        }
    }
}
