<?php

namespace App\Dto;


class UpdateColorJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}