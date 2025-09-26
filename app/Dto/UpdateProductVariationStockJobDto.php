<?php

namespace App\Dto;

readonly class UpdateProductVariationStockJobDto
{
    public function __construct(
      public int $id,
      public int $movimentation,
    ) {}
}