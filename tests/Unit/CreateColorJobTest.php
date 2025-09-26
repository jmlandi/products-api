<?php

namespace Tests\Unit;

use App\Jobs\CreateColorJob;
use App\Dto\CreateColorJobDto;
use PHPUnit\Framework\TestCase;

class CreateColorJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
    $dto = new CreateColorJobDto(name: 'Red');
        $job = new CreateColorJob($dto);
        $this->assertInstanceOf(CreateColorJob::class, $job);
    }
}
