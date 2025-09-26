<?php

namespace App\Dto;

readonly class DetachProductTagJobDto
{
    public function __construct(
      public int $id,
      public int $tag_id
    ) {}
}