<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request, User $user)
    {

        $this->authorize('update', $user);

        if ($request->name) {
            auth()->user()->update(['name' => $request->name]);
        }

        if ($request->email) {
            auth()->user()->update(['email' => $request->email]);
        }

        if ($request->old_password) {
            $authenticated = auth()->attempt(['email' => auth()->user()->email, 'password' => $request->old_password]);

            if ($request->new_password && $authenticated) {
                auth()->user()->update(['password' => bcrypt($request->new_password)]);
            }
        }

        if ($request->contact_info) foreach ($request->contact_info as $contact_info) {
            $ci = auth()->user()->contact_info()
                ->where('info', '=', $contact_info['info'])
                ->where('type', '=', $contact_info['type'])
                ->first();

            if (!$ci) auth()->user()->contact_info()->create(['info' => $contact_info['info'], 'type' => $contact_info['type']]);
        }



        return redirect('/');
    }
}
