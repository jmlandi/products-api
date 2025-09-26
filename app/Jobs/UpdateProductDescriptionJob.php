<?php

namespace App\Jobs;

use App\Dto\UpdateProductDescriptionJobDto;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductDescriptionJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductDescriptionJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->description;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        if($product)
        {
            $product->description = $this->payload->description;
            $product->save();
        }
    }
}
