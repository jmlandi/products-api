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
        return $this->payload->imageUrl;
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
