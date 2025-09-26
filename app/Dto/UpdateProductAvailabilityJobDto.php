<?php

namespace App\Dto;

readonly class UpdateProductAvailabilityJobDto
{
    public function __construct(
      public int $id,
      public bool $is_active,
    ) {}
}