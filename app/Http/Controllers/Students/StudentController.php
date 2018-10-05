<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }

	public function index()
	{
		return view('students.index');
	}
	public function preenrol()
	{
		return view('students.preenrol');
	}

	public function evaluate()
	{
		return view('students.evaluate');
	}

	public function schedule()
	{
		return view('students.schedule');
	}

	public function sendsms()
	{
		return view('students.sendsms');
	}

	public function login()
    {
        return view('students.login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/studentlogin');
    }

    public function checkLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email',$request->email)->first();
        if (Auth::attempt($credentials) && $user->hasRole('Student')) {
            // Authentication passed...
            return redirect()->intended('/student/index');
        }
        return Redirect::back()->withInput()->withErrors('Wrong username/password combination.');
    }
}
