<?php

namespace App\DTO;

class MenuDTO
{
    public function __construct(
        public readonly bool $isCustom,
        public readonly string $fileSrc,
        public readonly ?string $name = null,
    ) { }
}
