<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

        $this->middleware(['checkAdminAuth']);
    }
    public function index()
    {
        // return ec;
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
        ]);

        if (
            Auth::guard('admin')->attempt(
                ['email' => $request->input('email'), 'password' => $request->input('password')],

                $request->filled('remember')
            )
        ) {
            $user = Auth::guard('admin')->user();
            if ($user) {
                return redirect()->route('admin.dashboard')->with('success', 'You are Logged in sucessfully.');
            }
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }


    }
}