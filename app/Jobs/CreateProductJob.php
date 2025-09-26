<?php

namespace App\Jobs;

use App\Dto\CreateProductJobDTO;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateProductjob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateProductJobDTO $payload) { }

    public function uniqueId()
    {
        return $this->payload->sku;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = new Product();

        $brand = Brand::firstOrCreate(['name' => trim($this->payload->brand)]);
        $product->brand_id = $brand->id;
        
        foreach ($this->payload->tags ?? [] as $tagName)
        {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $product->tags()->attach($tag->id);
        }
        
        $product->sku = trim($this->payload->sku);
        $product->name = trim($this->payload->name);
        $product->description = trim($this->payload->description);
        $product->price = $this->payload->price;
        $product->is_active = $this->payload->is_active ?? true;
        
        $product->save();
        
    }
}
