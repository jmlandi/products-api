<?php

namespace App\Dto;

readonly class UpdateProductNameJobDto
{
    public function __construct(
      public int $id,
      public string $name,
    ) {}
}