<?php

namespace App\Dto;

readonly class CreateImageJobDto
{
    public function __construct(
        public string $image_url,
        public string $alt_text,
    ) {}
}