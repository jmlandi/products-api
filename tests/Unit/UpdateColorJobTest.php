<?php

namespace Tests\Unit;

use App\Jobs\UpdateColorJob;
use App\Dto\UpdateColorJobDto;
use PHPUnit\Framework\TestCase;

class UpdateColorJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateColorJobDto(id: 1, name: 'Red');
        $job = new UpdateColorJob($dto);
        $this->assertInstanceOf(UpdateColorJob::class, $job);
    }
}
