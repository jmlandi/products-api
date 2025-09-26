<?php

namespace Tests\Unit;

use App\Jobs\UpdateImageAltTextJob;
use App\Dto\UpdateImageAltTextJobDto;
use PHPUnit\Framework\TestCase;

class UpdateImageAltTextJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateImageAltTextJobDto(id: 1, alt_text: 'alt');
        $job = new UpdateImageAltTextJob($dto);
        $this->assertInstanceOf(UpdateImageAltTextJob::class, $job);
    }
}
