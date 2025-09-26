<?php

namespace App\Dto;

class UpdateBrandJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}