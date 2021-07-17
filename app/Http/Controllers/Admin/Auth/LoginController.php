<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    
    /**
     * Show login form
     *
     * @return void
     */
    public function loginForm()
    {
        return view('admin.auth.login');
    }
    
    /**
     * Logs in admin
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function login(Request $request)
    {
        //dd($request->all());
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->route('admin.login-form')->withInput($request->only('email', 'remember'));
    }

    
    /**
     * Logs out admin
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login-form');
    }
}
