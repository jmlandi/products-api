<?php

namespace App\Dto;

readonly class UpdateProductVariationSizeJobDto
{
    public function __construct(
      public int $id,
      public string $size,
    ) {}
}