<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Dto\UpdateImageAltTextJobDto;
use App\Models\Image;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateImageAltTextJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public UpdateImageAltTextJobDto $payload) { }

    public function uniqueId()
    {
        return $this->payload->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $data = new UpdateImageAltTextJobDto(
            id: $this->payload->id,
            alt_text: $this->payload->alt_text
        );
        $image = Image::find($data->id);
        if ($image) {
            $image->alt_text = $data->alt_text;
            $image->save();
        }
    }
}
