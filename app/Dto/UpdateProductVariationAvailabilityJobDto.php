<?php

namespace App\Dto;

readonly class UpdateProductVariationAvailabilityJobDto
{
    public function __construct(
      public int $id,
      public bool $is_active,
    ) {}
}