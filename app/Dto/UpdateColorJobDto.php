<?php

namespace App\Dto;

readonly class UpdateColorJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}