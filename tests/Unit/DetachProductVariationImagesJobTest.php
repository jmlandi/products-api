<?php

namespace Tests\Unit;

use App\Jobs\DetachProductVariationImagesJob;
use App\Dto\DetachProductVariationImagesJobDto;
use PHPUnit\Framework\TestCase;

class DetachProductVariationImagesJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new DetachProductVariationImagesJobDto(1, 2);
        $job = new DetachProductVariationImagesJob($dto);
        $this->assertInstanceOf(DetachProductVariationImagesJob::class, $job);
    }
}
