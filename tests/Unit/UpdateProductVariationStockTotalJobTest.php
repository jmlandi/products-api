<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductVariationStockTotalJob;
use App\Dto\UpdateProductVariationStockJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductVariationStockTotalJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
    $dto = new UpdateProductVariationStockJobDto(id: 1, movimentation: 10);
    $job = new UpdateProductVariationStockTotalJob($dto);
        $this->assertInstanceOf(UpdateProductVariationStockTotalJob::class, $job);
    }
}
