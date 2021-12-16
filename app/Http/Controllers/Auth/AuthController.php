<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['u_email' => $email, 'u_password' => $password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
