<?php

namespace App\Jobs;

use App\Dto\DetachProductTagJobDto;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DetachProductTagJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public DetachProductTagJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->tag_id . $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = Product::find($this->payload->id);
        $tag = Tag::find($this->payload->tag_id);
        if ($product && $tag)
        {
            $product->tags()->detach($tag->id);
        }
    }
}
