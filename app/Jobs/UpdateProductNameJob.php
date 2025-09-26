<?php

namespace App\Jobs;

use App\Dto\UpdateProductNameJobDto;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateProductNameJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductNameJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        if ($product)
        {
            $product->name = $this->payload->name;
            $product->save();
        }
    }
}
