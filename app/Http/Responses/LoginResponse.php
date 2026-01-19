<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if ($request->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('banking.dashboard');
    }
}