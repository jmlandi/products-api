<?php

namespace Tests\Unit;

use App\Jobs\CreateProductJob;
use App\Dto\CreateProductJobDto;
use PHPUnit\Framework\TestCase;

class CreateProductJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new CreateProductJobDto(
            sku: 'SKU123',
            name: 'Product',
            price: 10.0,
            brand_id: 1,
            description: 'desc',
            is_active: true
        );
        $job = new CreateProductJob($dto);
        $this->assertInstanceOf(CreateProductJob::class, $job);
    }
}
