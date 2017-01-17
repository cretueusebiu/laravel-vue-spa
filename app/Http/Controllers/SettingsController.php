<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return $user;
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, ['password' => 'required|confirmed|min:6']);

        $request->user()->update(['password' => $request->password]);

        return response()->json(null, 204);
    }
}
