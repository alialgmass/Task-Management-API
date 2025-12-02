<?php

namespace App\Domains\Project\DTO;

class CreateProjectDTO
{
    public function __construct(
        public string $name,
        public ?string $description,
    ) {}
}
