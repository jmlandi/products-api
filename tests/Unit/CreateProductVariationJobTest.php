<?php

namespace Tests\Unit;

use App\Jobs\CreateProductVariationJob;
use App\Dto\CreateProductVariationJobDto;
use PHPUnit\Framework\TestCase;

class CreateProductVariationJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new CreateProductVariationJobDto(
            product_id: 1,
            color_id: 2,
            child_sku: 'CHILD1',
            size: 'L',
            is_active: true
        );
        $job = new CreateProductVariationJob($dto);
        $this->assertInstanceOf(CreateProductVariationJob::class, $job);
    }
}
