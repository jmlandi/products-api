<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductDescriptionJob;
use App\Dto\UpdateProductDescriptionJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductDescriptionJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductDescriptionJobDto(id: 1, description: 'desc');
        $job = new UpdateProductDescriptionJob($dto);
        $this->assertInstanceOf(UpdateProductDescriptionJob::class, $job);
    }
}
