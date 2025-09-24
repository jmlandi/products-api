<?php

namespace App\Dto;

readonly class CreateTagJobDto
{
    public function __construct(
        public string $name
    ) {}
}