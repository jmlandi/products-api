<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationAvailabilityJob;
use App\Dto\UpdateProductVariationAvailabilityJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationAvailabilityJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductVariationAvailabilityJobDto(id: 1, is_active: true);
        $job = new UpdateProductVariationAvailabilityJob($dto);
        $this->assertInstanceOf(UpdateProductVariationAvailabilityJob::class, $job);
    }
}
