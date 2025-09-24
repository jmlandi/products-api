<?php

namespace App\Dto;

readonly class CreateColorJobDto
{
    public function __construct(
      public string $name
    ) {}
}