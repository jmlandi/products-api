<?php

namespace Tests\Unit;

use App\Jobs\AttachProductVariationImagesJob;
use App\Dto\AttachProductVariationImagesJobDto;
use PHPUnit\Framework\TestCase;

class AttachProductVariationImagesJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
    $dto = new AttachProductVariationImagesJobDto(1, 2);
        $job = new AttachProductVariationImagesJob($dto);
        $this->assertInstanceOf(AttachProductVariationImagesJob::class, $job);
    }
}
