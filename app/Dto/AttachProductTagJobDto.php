<?php

namespace App\Dto;

readonly class AttachProductTagJobDto
{
    public function __construct(
      public int $id,
      public int $tag_id
    ) {}
}