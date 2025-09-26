<?php

namespace App\Jobs;

use App\Dto\CreateColorJobDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Models\Color;
use Illuminate\Support\Facades\Log;

class CreateColorJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateColorJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $color = new Color();
        $color->name = $this->payload->name;
        $color->save();
    }
}
