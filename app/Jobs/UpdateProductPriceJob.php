<?php

namespace App\Jobs;

use App\Dto\UpdateProductPriceJobDto;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductPriceJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductPriceJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->price;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        if ($product)
        {
            $product->price = $this->payload->price;
            $product->save();
        }
    }
}
