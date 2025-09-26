<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationChildSkuJob;
use App\Dto\UpdateProductVariationChildSkuJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationChildSkuJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductVariationChildSkuJobDto(id: 1, child_sku: 'CHILD1');
        $job = new UpdateProductVariationChildSkuJob($dto);
        $this->assertInstanceOf(UpdateProductVariationChildSkuJob::class, $job);
    }
}
