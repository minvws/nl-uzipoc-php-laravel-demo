<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg\Auth;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JsonException;
use Jumbojett\OpenIDConnectClientException;
use MinVWS\OpenIDConnectLaravel\Http\Responses\LoginResponseHandlerInterface;
use MinVWS\OpenIDConnectLaravel\OpenIDConnectClient;
use MinVWS\OpenIDConnectLaravel\Services\ExceptionHandlerInterface;
use Symfony\Component\HttpFoundation\Response;

class OidcLoginController extends Controller
{
    public function __construct(
        protected OpenIDConnectClient $client,
        protected ExceptionHandlerInterface $exceptionHandler,
        protected LoginResponseHandlerInterface $responseHandler,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        // This redirects to the client and handles the redirect back
        try {
            $acmeToken = $request->query('acme_token');
            if ($acmeToken) {
                $this->client->addAuthParam(
                    ['claims' => json_encode(['acme_token' => $acmeToken], JSON_THROW_ON_ERROR)]
                );
            }
            $this->client->setLoginHint($this->getLoginHint($request));
            $this->client->authenticate();
        } catch (OpenIDConnectClientException $e) {
            return $this->exceptionHandler->handleExceptionWhileAuthenticate($e);
        } catch (JsonException $e) {
            return $this->exceptionHandler->handleException($e);
        }

        // After the redirect back, we can get the user information
        try {
            $userInfo = $this->client->requestUserInfo();
            if (!is_object($userInfo)) {
                throw new OpenIDConnectClientException('Received user info is not an object');
            }
        } catch (OpenIDConnectClientException $e) {
            return $this->exceptionHandler->handleExceptionWhileRequestUserInfo($e);
        } catch (Exception $e) {
            return $this->exceptionHandler->handleException($e);
        }

        // Return the user information to response handler
        return $this->responseHandler->handleLoginResponse($userInfo);
    }

    /**
     * Get the login hint from the request.
     * @param Request $request
     * @return string|null
     */
    protected function getLoginHint(Request $request): ?string
    {
        $loginHint = $request->query('login_hint');
        if (!is_string($loginHint)) {
            return null;
        }

        return $loginHint;
    }
}
