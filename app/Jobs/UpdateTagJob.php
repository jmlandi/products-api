<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Dto\UpdateTagJobDto;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateTagJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateTagJobDto $payload) { }


    public function uniqueId()
    {
        return $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tag = Tag::find($this->payload->id);
        if ($tag)
        {
            $tag->name = $this->payload->name;
            $tag->save();
        }
    }
}
