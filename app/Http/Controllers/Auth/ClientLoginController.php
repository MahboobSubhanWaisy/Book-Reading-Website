<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ClientLoginController extends Controller
{

	use AuthenticatesUsers;



    protected $redirectTo = RouteServiceProvider::DEFAULT;

    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }


    public function username()
    {
        return 'clt_email';
    }

    protected function guard()
    {
        return Auth::guard('client');
    }


    public function showLoginForm()
    {
        return view('frontend.signin');
    }

    public function signout(){
        Auth::logout();
    }
}
