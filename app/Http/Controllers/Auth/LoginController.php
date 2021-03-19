<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    // protected function validateLogin(Request $request){
    //     $rules = [
    //         $this->username() => ['required'],
    //         'password' => ['required'],
    //     ];

    //     $message = [
    //         $this->username().required => 'Email Wajib Diisi',
    //         'password.required' => 'Password Wajib Diisi',
    //     ];

    //     $request->validate($rules, $message);
    // }

    // protected function sendFailedLoginResponse(Request $request){
    //     throw ValidationException::withMessages([
    //         $this->username() => [trans('email/pasword Yang anda masukan salah')],
    //     ]);
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
