<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\OAuthProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        config([
            'services.github.redirect' => route('oauth.callback', 'github'),
        ]);
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->stateless()->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param  string $driver
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->stateless()->user();

        if ($provider = $this->findProvider($driver, $user->getId())) {
            $provider->update([
                'access_token' => $user->token,
                'refresh_token' => $user->refreshToken,
            ]);

            $user = $provider->user;
        } else {
            if (User::where('email', $user->getEmail())->exists()) {
                return redirect('/?error=email_taken');
            }

            $user = $this->createUser($driver, $user);
        }

        $token = $this->guard()->login($user);

        return redirect('/home')->withCookie(
            cookie('token', $token, 0, null, null, false, false)
        );
    }

    /**
     * @param  string $driver
     * @param  \Laravel\Socialite\Contracts\User $sUser
     * @return \App\User
     */
    protected function createUser($driver, $sUser)
    {
        $user = User::create([
            'name' => $sUser->getName(),
            'email' => $sUser->getEmail(),
        ]);

        $user->oauthProviders()->create([
            'provider' => $driver,
            'provider_user_id' => $sUser->getId(),
            'access_token' => $sUser->token,
            'refresh_token' => $sUser->refreshToken,
        ]);

        return $user;
    }

    /**
     * @param  string $driver
     * @param  string $userId
     * @return \App\OAuthProvider|null
     */
    protected function findProvider($driver, $userId)
    {
        return OAuthProvider::where('provider', $driver)
            ->where('provider_user_id', $userId)
            ->first();
    }
}
