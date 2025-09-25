<?php

namespace App\Dto;

class CreateImageJobDto
{
    public function __construct(
        public string $imageUrl,
        public string $altText = ""
    ) {}
}