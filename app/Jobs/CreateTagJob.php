<?php

namespace App\Jobs;

use App\Dto\CreateTagJobDTO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Tag;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;

class CreateTagJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateTagJobDTO $payload) { }

    public function uniqueId()
    {
        return $this->payload->name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tag = Tag::create([
            'name' => $this->payload->name,
        ]);
        $tag->save();   
    }
}
