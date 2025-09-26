<?php

namespace Tests\Unit;

use App\Jobs\CreateBrandJob;
use App\Dto\CreateBrandJobDto;
use PHPUnit\Framework\TestCase;

class CreateBrandJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new CreateBrandJobDto(name: 'Brand');
        $job = new CreateBrandJob($dto);
        $this->assertInstanceOf(CreateBrandJob::class, $job);
    }
}
