<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductAvailabilityJob;
use App\Dto\UpdateProductAvailabilityJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductAvailabilityJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductAvailabilityJobDto(id: 1, is_active: true);
        $job = new UpdateProductAvailabilityJob($dto);
        $this->assertInstanceOf(UpdateProductAvailabilityJob::class, $job);
    }
}
