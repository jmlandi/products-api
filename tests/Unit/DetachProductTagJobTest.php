<?php

namespace Tests\Unit;

use App\Jobs\DetachProductTagJob;
use App\Dto\DetachProductTagJobDto;
use PHPUnit\Framework\TestCase;

class DetachProductTagJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new DetachProductTagJobDto(id: 1, tag_id: 2);
        $job = new DetachProductTagJob($dto);
        $this->assertInstanceOf(DetachProductTagJob::class, $job);
    }
}
