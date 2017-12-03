<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->email() => 'required',
            'password' => 'required',
            // new rules here
        ]);
    }
    public function authenticate(Request $request)
    {
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
            'isAdmin' => 1,
        ];
        if (Auth::attempt($data)) {
            // Authentication passed...

            return redirect()->intended('dashboard');
        } else {
            $errors = new MessageBag(['password' => ['Sai email hoặc mật khẩu']]);

            return redirect()->intended('login')->withErrors($errors)->withInput(Input::except('password'));
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('login');
    }
    public function guard()
    {
        return Auth::guard();
    }
}
