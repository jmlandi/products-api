<?php

namespace App\Dto;

readonly class UpdateProductVariationColorJobDto
{
    public function __construct(
      public int $id,
      public int $color_id,
    ) {}
}