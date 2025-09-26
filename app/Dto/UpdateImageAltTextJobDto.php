<?php

namespace App\Dto;

readonly class UpdateImageAltTextJobDto
{
    public function __construct(
      public int $id,
      public string $altText
    ) {}
}