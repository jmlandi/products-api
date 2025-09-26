<?php

namespace Tests\Unit;

use App\Jobs\CreateImageJob;
use App\Dto\CreateImageJobDto;
use PHPUnit\Framework\TestCase;

class CreateImageJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
    $dto = new CreateImageJobDto(image_url: 'http://example.com/image.jpg', alt_text: 'alt text');
        $job = new CreateImageJob($dto);
        $this->assertInstanceOf(CreateImageJob::class, $job);
    }
}
