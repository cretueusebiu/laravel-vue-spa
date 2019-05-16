<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Mark the user's email address as verified.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request, User $user)
    {
        if (! URL::hasValidSignature($request)) {
            return response()->json([
                'status' => __('The verification link is invalid.'),
            ], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => __('The email is already verified.'),
            ], 400);
        }

        $user->markEmailAsVerified();

        event(new Verified($user));

        return response()->json([
            'status' => __('Your email has been verified!'),
        ]);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resend(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            throw ValidationException::withMessages([
                'email' => ['We can\'t find a user with that e-mail address.'],
            ]);
        }

        if ($user->hasVerifiedEmail()) {
            throw ValidationException::withMessages([
                'email' => ['The email is already verified.'],
            ]);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'status' => __('We have e-mailed your verification link!'),
        ]);
    }
}
