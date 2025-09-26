<?php

namespace App\Dto;

readonly class CreateProductVariationJobDto
{
    public function __construct(
        public int $product_id,
        public int $color_id,
        public string $child_sku,
        public string $size,
        public bool $is_active,
    ) {}
}