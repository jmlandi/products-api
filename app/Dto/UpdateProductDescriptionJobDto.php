<?php

namespace App\Dto;

readonly class UpdateProductDescriptionJobDto
{
    public function __construct(
      public int $id,
      public string $description,
    ) {}
}