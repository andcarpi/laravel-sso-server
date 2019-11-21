<?php

namespace andcarpi\LaravelSSOServer\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends BaseController
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        $origin = $request->has('redirect') ? $request->input('redirect') : null;
        return view(config('laravel-sso-server.login_view'))->with('origin', $origin);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($request->has('redirect')) {
            return redirect($request->input('redirect'));
        } else {
            if (config('laravel-sso-server.no_redirect_defined.mode') == 'url') {
                return config('laravel-sso-server.no_redirect_defined.destination');
            } else {
                return route(config('laravel-sso-server.no_redirect_defined.destination'));
            }
        }
    }

}
