<?php

namespace Tests\Unit;

use App\Jobs\AttachProductTagJob;
use App\Dto\AttachProductTagJobDto;
use PHPUnit\Framework\TestCase;

class AttachProductTagJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new AttachProductTagJobDto(id: 1, tag_id: 2);
        $job = new AttachProductTagJob($dto);
        $this->assertInstanceOf(AttachProductTagJob::class, $job);
    }
}
