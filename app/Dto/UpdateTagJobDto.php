<?php

namespace App\Dto;

readonly class UpdateTagJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}