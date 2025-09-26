<?php

namespace App\Dto;

readonly class AttachProductVariationImagesJobDto
{
    public function __construct(
      public int $id,
      public int $image_id
    ) {}
}