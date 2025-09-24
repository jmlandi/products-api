<?php

namespace App\Dto;

readonly class CreateProductJobDto
{
    public function __construct(
        public string $sku,
        public string $name,
        public float $price,
        public ?string $description,
        public ?string $brand,
        public ?bool $is_active,
        public ?array $tags,
        public ?array $colors,
        public ?array $sizes
    ) {}
}