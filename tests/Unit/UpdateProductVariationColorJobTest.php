<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationColorJob;
use App\Dto\UpdateProductVariationColorJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationColorJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductVariationColorJobDto(id: 1, color_id: 2);
        $job = new UpdateProductVariationColorJob($dto);
        $this->assertInstanceOf(UpdateProductVariationColorJob::class, $job);
    }
}
