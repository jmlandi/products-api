<?php

namespace Tests\Unit;

use App\Jobs\UpdateProductPriceJob;
use App\Dto\UpdateProductPriceJobDto;
use PHPUnit\Framework\TestCase;

class UpdateProductPriceJobTest extends TestCase
{
    public function test_job_can_be_instantiated()
    {
        $dto = new UpdateProductPriceJobDto(id: 1, price: 10.0);
        $job = new UpdateProductPriceJob($dto);
        $this->assertInstanceOf(UpdateProductPriceJob::class, $job);
    }
}
