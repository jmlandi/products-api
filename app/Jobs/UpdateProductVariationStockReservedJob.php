<?php

namespace App\Jobs;

use App\Dto\UpdateProductVariationSizeJobDto;
use App\Dto\UpdateProductVariationStockJobDto;
use App\Models\ProductVariation;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class UpdateProductVariationStockReservedJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateProductVariationStockJobDto $payload) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $productVariation = ProductVariation::find($this->payload->id);
        if (!$productVariation) return;
        $stockRow = DB::table('stock')->where('product_variation_id', '=', $productVariation->id)->first();
        $stock = Stock::find($stockRow->id);
        $stock->quantity_reserved += $this->payload->movimentation;
        $stock->save(); 
    }
}
