<?php

declare(strict_types=1);

namespace App\Models\Uzi;

class UziRelation
{
    /**
     * @param string $entityName
     * @param string $ura
     * @param UziRelationRole[] $roles
     */
    public function __construct(
        public string $entityName,
        public string $ura,
        public array $roles
    ) {
    }
}
