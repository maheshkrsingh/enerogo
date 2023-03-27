<?php

namespace Modules\Users\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Modules\Users\Entities\User;
use Modules\Users\Http\Requests\RegisterRequest;

use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        return view('users::auth.register');
    }
    public function registerpost(RegisterRequest $request){
       $request->validated();
       $user = new User();
       $user->first_name=$request->firstname;
       $user->middle_name=$request->middle_name;
       $user->last_name=$request->last_name;
       $user->email=$request->email;
       $user->mobile_no=$request->mobile_number;
       $user->password=$request->password;
       $user->save();
       return redirect()->route('users.register')->with('message','Account successfully registered.');
    }

   
}
