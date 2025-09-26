<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationSizeJob;
use App\Dto\UpdateProductVariationSizeJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationSizeJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductVariationSizeJobDto(id: 1, size: 'L');
        $job = new UpdateProductVariationSizeJob($dto);
        $this->assertInstanceOf(UpdateProductVariationSizeJob::class, $job);
    }
}
