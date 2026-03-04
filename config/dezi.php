<?php

declare(strict_types=1);

return [

    /**
     * Expected issuer (`iss`) for the nested Dezi `verklaring`.
     * This adds an allowed issuer next to the default `OIDC_ISSUER`.
     */
    'issuer' => env('DEZI_ISSUER'),

];
