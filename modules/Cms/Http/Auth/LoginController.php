<?php

namespace Cms\Http\Auth;

use Cms\Http\BaseController;
use Cms\Http\Requests\LoginRequest;
use Cms\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('isGuest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('theme::auth.login');
    }

    /**
     * Create user login.
     *
     * @param LoginRequest $request
     * @param UserRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request, UserRepository $repository)
    {
        $user = $request->resolvedUser();

        $repository->login($user, $request->remember);

        flash()->success(trans('messages.login.title', ['name' => $user->name]), trans('messages.login.content'));

        return isset($request->ref) ? redirect(route($request->ref)) : redirect($this->redirectTo);
    }
}
