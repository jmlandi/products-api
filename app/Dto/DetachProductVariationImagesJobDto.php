<?php

namespace App\Dto;

readonly class DetachProductVariationImagesJobDto
{
    public function __construct(
      public int $id,
      public int $image_id
    ) {}
}