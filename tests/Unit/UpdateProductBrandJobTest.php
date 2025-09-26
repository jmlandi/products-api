<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductBrandJob;
use App\Dto\UpdateProductBrandJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductBrandJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductBrandJobDto(id: 1, brand_id: 2);
        $job = new UpdateProductBrandJob($dto);
        $this->assertInstanceOf(UpdateProductBrandJob::class, $job);
    }
}
