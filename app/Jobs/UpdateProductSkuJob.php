<?php

namespace App\Jobs;

use App\Dto\UpdateProductSkuJobDto;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductSkuJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductSkuJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->sku;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        if ($product)
        {
            $product->sku = $this->payload->sku;
            $product->save();
        }
    }
}
