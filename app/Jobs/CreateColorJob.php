<?php

namespace App\Jobs;

use App\Dto\CreateColorJobDTO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Color;

class CreateColorJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateColorJobDTO $payload) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $color = new Color();
        $color->name = $this->payload['name'];
        $color->save();
    }
}
