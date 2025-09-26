<?php

namespace App\Jobs;

use App\Dto\UpdateColorJobDto;
use App\Models\Color;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateColorJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateColorJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $color = Color::find($this->payload->id);
        if ($color) {
            $color->name = $this->payload->name;
            $color->save();
        }
    }
}
