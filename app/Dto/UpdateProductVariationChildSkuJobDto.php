<?php

namespace App\Dto;

readonly class UpdateProductVariationChildSkuJobDto
{
    public function __construct(
      public int $id,
      public string $child_sku,
    ) {}
}