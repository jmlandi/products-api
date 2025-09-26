<?php

namespace App\Dto;

readonly class UpdateProductPriceJobDto
{
    public function __construct(
      public int $id,
      public float $price,
    ) {}
}