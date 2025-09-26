<?php

namespace App\Jobs;

use App\Dto\UpdateProductBrandJobDto;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductBrandJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductBrandJobDto $payload) { }


    public function uniqueId()
    {
        return $this->payload->brand_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        $brand = Brand::find($this->payload->brand_id);
        if ($product && $brand)
        {
            $product->brand_id = $brand->id;
            $product->save();
        }
    }
}
