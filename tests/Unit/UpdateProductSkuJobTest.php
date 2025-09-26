<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductSkuJob;
use App\Dto\UpdateProductSkuJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductSkuJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductSkuJobDto(id: 1, sku: 'SKU123');
        $job = new UpdateProductSkuJob($dto);
        $this->assertInstanceOf(UpdateProductSkuJob::class, $job);
    }
}
