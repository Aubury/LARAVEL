<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\Admin;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;
    protected $redirectAfterLogout = RouteServiceProvider::HOME;
    protected $guard = 'admin';
    public $table = 'admins';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function guard(){
        return Auth::guard('admin');
    }

    public function showLoginForm(){

        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect($this->redirectAfterLogout);
    }

    public function update($user)
    {
        DB::table('admins')->where('id', $user->id)->update(['last_visit'=>now()]);

    }
    public function redirectPath(){

        return redirect($this->redirectTo);
    }

//    public function authenticate(Request $request)
//    {
//        $credentials = $request->only('login', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//        }else{
//            return redirect('/admin-log');
//        }
//    }

//    protected function guard(){
//        return Auth::guard('admin');
//    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if(Auth::guard('admin')->attempt([
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ], $request->filled('remember'))) {
//
            $admin = DB::table('admins')->where('email', $request->get('email'))->first();
//            $upd = HASH::make(time() . $admin->id);
//
//            DB::table('log_in')->insert([
//                'user_id' => $admin->id,
//                'upd' => $upd,
//                'ip_address' => $this->getIp(),
//                'user_agent' => $request->header('User-Agent'),
//                'last_activity' => NOW()
//            ]);
//
            $this->update($admin);
//
//            $this->startLogin($request, $admin);
            return redirect($this->redirectTo);
//
        }else{
            return $this->sendFailedLoginResponse($request);
        }


    }
    public function getIp(){
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            {
                $ip_addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
            {
                $ip_addr = $_SERVER["HTTP_CLIENT_IP"];
            }
            else
            {
                $ip_addr = $_SERVER["REMOTE_ADDR"];
            }
        }
        else
        {
            if ( getenv( 'HTTP_X_FORWARDED_FOR' ) )
            {
                $ip_addr = getenv( 'HTTP_X_FORWARDED_FOR' );
            }
            elseif ( getenv( 'HTTP_CLIENT_IP' ) )
            {
                $ip_addr = getenv( 'HTTP_CLIENT_IP' );
            }
            else
            {
                $ip_addr = getenv( 'REMOTE_ADDR' );
            }
        }
        return $ip_addr;
    }
}
