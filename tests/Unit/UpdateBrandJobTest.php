<?php

namespace Tests\Unit;

use App\Jobs\UpdateBrandJob;
use App\Dto\UpdateBrandJobDto;
use PHPUnit\Framework\TestCase;

class UpdateBrandJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateBrandJobDto(id: 1, name: 'Brand');
        $job = new UpdateBrandJob($dto);
        $this->assertInstanceOf(UpdateBrandJob::class, $job);
    }
}
