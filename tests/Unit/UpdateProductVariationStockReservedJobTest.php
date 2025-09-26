<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationStockReservedJob;
use App\Dto\UpdateProductVariationStockJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationStockReservedJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
    $dto = new UpdateProductVariationStockJobDto(id: 1, movimentation: 5);
    $job = new UpdateProductVariationStockReservedJob($dto);
        $this->assertInstanceOf(UpdateProductVariationStockReservedJob::class, $job);
    }
}
