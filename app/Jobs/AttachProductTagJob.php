<?php

namespace App\Jobs;

use App\Dto\AttachProductTagJobDto;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AttachProductTagJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public AttachProductTagJobDto $payload) { }

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
            // Attach the tag to the product without creating duplicate pivot rows.
            // syncWithoutDetaching will add the pivot if it doesn't exist.
            $product->tags()->syncWithoutDetaching([$tag->id]);
        }
    }
}
