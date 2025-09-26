<?php

namespace App\Dto;

readonly class CreateImageJobDto
{
    public function __construct(
        public string $imageUrl,
        public string $altText = ""
    ) {}
}