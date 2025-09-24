<?php

namespace App\Jobs;

use App\Dto\CreateTagJobDTO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Tag;

class CreateTagJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateTagJobDTO $payload) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tag = Tag::create([
            'name' => $this->payload['name'],
        ]);
        $tag->save();   
    }
}
