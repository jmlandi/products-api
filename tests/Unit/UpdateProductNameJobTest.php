<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductNameJob;
use App\Dto\UpdateProductNameJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductNameJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductNameJobDto(id: 1, name: 'Product');
        $job = new UpdateProductNameJob($dto);
        $this->assertInstanceOf(UpdateProductNameJob::class, $job);
    }
}
