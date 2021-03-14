<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD

=======
>>>>>>> 4cb2382947eed214a8dc8d0272268723d459254a

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
        $this->middleware('guest')->except('logout');
    }
    
    private const GUEST_USER_ID = 1;
    
    public function guestLogin()
    {
        // id = 3 のゲストユーザー情報が存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {

            return redirect('/');
        }
        
        return redirect('/');
    }
}
