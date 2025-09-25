<?php

namespace App\Dto;

class UpdateImageAltTextJobDto

{
    public function __construct(
      public int $id,
      public string $altText
    ) {}
}