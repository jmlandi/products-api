<?php

namespace App\Dto;

readonly class UpdateProductSkuJobDto
{
    public function __construct(
      public int $id,
      public string $sku,
    ) {}
}