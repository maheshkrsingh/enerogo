<?php

namespace Modules\Users\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Modules\Users\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        return view('users::auth.login');
    }
    public function loginpost(LoginRequest $request){
      
       $input = $request->all();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' =>$input['password'] )))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('users.login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
         return redirect()->route('users.index');
    }
    public function logout()
    {
        Session::flush();
        \Auth::logout();
        return redirect()->route('users.login');
    }
   
    
}
