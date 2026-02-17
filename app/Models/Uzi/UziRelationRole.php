<?php

declare(strict_types=1);

namespace App\Models\Uzi;

class UziRelationRole
{
    public function __construct(
        public string $code,
        public string $name,
    ) {
    }
}
