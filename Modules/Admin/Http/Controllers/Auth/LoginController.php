<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use  Modules\Admin\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login()
    {
     
        return view("admin::Auth.login");
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function loginpost(LoginRequest $request)
    {
        $request->validated();
        $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials))
        {
            if(auth()->user()->is_admin == 1){
                return redirect()
                ->route('dashboard')
                ->with('message', "You are logged in successfully.");
            }
        }
        return redirect()->back()->with('message','email and password invalid');
      
    }
    public function logout(){

         Session::flush();
         \Auth::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
