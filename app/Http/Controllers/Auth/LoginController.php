<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:lecturer')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    protected function Login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect(route('admin'));
        }

        elseif(Auth::guard('lecturer')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect(route('lecturer'));
        }

        elseif(Auth::guard('student')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect(route('student'));
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
