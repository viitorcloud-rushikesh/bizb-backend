<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialMediaHelper\SocialAccountsService;

class SocialAccountController extends Controller
{
    /**
     * @author Jaynil Parekh
     * @since 2020-06-03
     *
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-03
     *
     * Obtain the user information
     *
     * @param SocialAccountsService $accountService
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback(SocialAccountsService $accountService, $provider)
    {

        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);

        return redirect()->to('/');
    }
}
