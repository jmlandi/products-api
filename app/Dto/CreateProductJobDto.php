<?php

namespace App\Dto;

readonly class CreateProductJobDto
{
    public function __construct(
        public string $sku,
        public string $name,
        public float $price,
        public int $brand_id,
        public ?string $description,
        public ?bool $is_active
    ) {}
}