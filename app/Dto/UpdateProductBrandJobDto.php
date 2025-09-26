<?php

namespace App\Dto;

readonly class UpdateProductBrandJobDto
{
    public function __construct(
      public int $id,
      public int $brand_id,
    ) {}
}