<?php

namespace App\Jobs;

use App\Models\Image;
use App\Dto\CreateImageJobDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateImageJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateImageJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->image_url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = new CreateImageJobDto(
            image_url: $this->payload->image_url,
            alt_text: $this->payload->alt_text
        );
        $image = new Image();
        $image->image_url = $data->image_url;
        $image->alt_text = $data->alt_text;
        $image->save();
    }
}
