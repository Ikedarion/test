<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Controller;


use Laravel\Fortify\Contracts\LoginResponse;

use Laravel\Fortify\Contracts\LogoutResponse;

use Laravel\Fortify\Fortify;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\RegisterResponse;


class UserController extends Controller
{
    
    public function store(UserRequest $request,CreatesNewUsers $creator): RegisterResponse
        {
            if (config('fortify.lowercase_usernames')) {
                $request->merge([
                    Fortify::username() => Str::lower($request->{Fortify::username()}),
                ]);
            }

            event(new Registered($user = $creator->create($request->all())));

            return app(RegisterResponse::class);
        }


        public function destroy(Request $request): LogoutResponse
        {

            if ($request->hasSession()) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return app(LogoutResponse::class);
        }
    }