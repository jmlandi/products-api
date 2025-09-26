<?php

namespace Tests\Unit;

use App\Jobs\CreateTagJob;
use App\Dto\CreateTagJobDTO;
use App\Models\Tag;
use PHPUnit\Framework\TestCase;


class CreateTagJobTest extends TestCase
{


    public function test_job_can_be_instantiated()
    {
        $dto = new CreateTagJobDTO(name: 'Test Tag');
        $job = new CreateTagJob($dto);
        $this->assertInstanceOf(CreateTagJob::class, $job);
    }

    public function test_unique_id_returns_tag_name()
    {
        $dto = new CreateTagJobDTO(name: 'Unique Name');
        $job = new CreateTagJob($dto);
        $this->assertEquals('Unique Name', $job->uniqueId());
    }
}
