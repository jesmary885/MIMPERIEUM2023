<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse {
        //dd($request->user());
        if ($request->user()->status == 'activo' || $request->user()->status == 'inactivo_para_comisionar') {
            return redirect(route("home"));
        }
        // otro caso
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route("login"));
    }
}