<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg\Auth;

use Illuminate\Http\Request;
use JsonException;
use MinVWS\OpenIDConnectLaravel\Http\Controllers\LoginController;
use Symfony\Component\HttpFoundation\Response;

class OidcLoginController extends LoginController
{
    public function __invoke(Request $request): Response
    {
        // This redirects to the client and handles the redirect back
        $acmeToken = $request->query('acme_token');
        if ($acmeToken) {
            try {
                $this->client->addAuthParam(
                    ['claims' => json_encode(['acme_token' => $acmeToken], JSON_THROW_ON_ERROR)]
                );
            } catch (JsonException $e) {
                return $this->exceptionHandler->handleException($e);
            }
        }

        return parent::__invoke($request);
    }
}
