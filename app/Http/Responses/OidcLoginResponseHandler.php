<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Models\Uzi\UziUser;
use App\Models\Dezi\DeziUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use MinVWS\OpenIDConnectLaravel\Http\Responses\LoginResponseHandlerInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class OidcLoginResponseHandler implements LoginResponseHandlerInterface
{
    /**
     * @param object $userInfo
     */
    public function handleLoginResponse(object $userInfo): Response
    {
        if (property_exists($userInfo, 'verklaring')) {
            /** @var object{
             *     jti: string,
             *     iat: int,
             *     exp: int,
             *     iss: string,
             *     aud: string,
             *     loa_authn: string,
             *     json_schema: string,
             *     verklaring_id: string,
             *     verklaring: string
             * } $userInfo
             */
            $user = DeziUser::deserializeFromObject($userInfo);
        } else {
            /** @var object{
             *     relations: array<int, object{entity_name: string, ura: string, roles: array<string>}>,
             *     initials: ?string,
             *     surname: ?string,
             *     surname_prefix: ?string,
             *     uzi_id: string,
             *     loa_uzi: string,
             *     loa_authn: string
             * } $userInfo
             */
            $user = UziUser::deserializeFromObject($userInfo);
            if (!$user->hasRelations()) {
                // Received user that has no relations to the Ziekenboeg
                // We do not allow the user to login and show a message
                return redirect()
                    ->route('ziekenboeg.auth.no-relations')
                    ->with('user', $user);
            }
        }

        $user->setJwt(Session::get('oidc_jwt') ?? '');

        if (empty($user->getJwt())) {
            return redirect()
                ->route('index')
                ->with('error', __('Something went wrong with logging in, please try again.'));
        }

        Auth::setUser($user);

        return new RedirectResponse(route('ziekenboeg.users.home'));
    }
}
