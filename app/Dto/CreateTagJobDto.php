<?php

namespace App\Dto;

class CreateTagJobDto
{
    public function __construct(
        public string $name
    ) {}
}