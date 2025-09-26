<?php

namespace App\Dto;

readonly class UpdateBrandJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}