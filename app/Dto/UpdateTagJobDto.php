<?php

namespace App\Dto;

class UpdateTagJobDto
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}