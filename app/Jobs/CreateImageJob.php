<?php

namespace App\Jobs;

use App\Models\Image;
use App\Dto\CreateImageJobDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateImageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public CreateImageJobDto $payload)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = new CreateImageJobDto(
            imageUrl: $this->payload->imageUrl,
            altText: $this->payload->altText
        );
        $image = new Image();
        $image->imageUrl = $data->imageUrl;
        $image->altText = $data->altText;
        $image->save();
    }
}
