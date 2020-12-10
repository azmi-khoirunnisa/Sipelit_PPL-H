<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
      if (Auth::user()->hasAnyRole('admin')) {
        $this->redirectTo = route('admin.dashboard');
        return $this->redirectTo;
      }
      elseif (Auth::user()->hasAnyRole('petani')) {
        $this->redirectTo = route('petani.dashboard');
        return $this->redirectTo;
      }else {
        $this->redirectTo = route('pemborong');
        return $this->redirectTo;
      }
    }

}
