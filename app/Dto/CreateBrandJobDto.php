<?php

namespace App\Dto;

readonly class CreateBrandJobDto
{
    public function __construct(
      public string $name
    ) {}
}