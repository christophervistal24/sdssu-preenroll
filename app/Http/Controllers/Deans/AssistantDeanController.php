<?php

namespace App\Http\Controllers\Deans;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\InstructorSchedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AssistantDeanController extends Controller
{
	public function index()
	{

    	$scheds = InstructorSchedule::all();
    	return view('deans.assistant.listschedule',compact('scheds'));
	}

	public function assign(InstructorSchedule $schedule_info)
	{
		$instructors = Instructor::orderBy('id','DESC')->where('active','1')->get();
    	return view('deans.assistant.index',compact('instructors','schedule_info'));
	}

	public function submitassign(Request $request,InstructorSchedule $schedule_info)
	{
		$schedule_info->instructor = $request->instructor_name;
		$schedule_info->save();
		return redirect('/assistantdean/index')->with('status',$schedule_info->subject . ' is now assign to ' . $request->instructor_name);
	}

    public function showLoginForm()
    {
    	return view('deans.assistant.showlogin');
    }

    public function submitlogin(Request $request)
    {
	  		$validatedData = $request->validate([
	            'id_number' => 'required',
	            'password'  => 'required',
	        ]);

	        $credentials = $request->only('id_number', 'password');
	        $admin = User::where('id_number',$request->id_number)->first();
	        if (Auth::attempt($credentials) && $admin->hasRole('Assistant Dean')) {
	            // Authentication passed...
	            return redirect()->intended('/assistantdean/index');
	        }
	        return Redirect::back()->withInput()->withErrors('Wrong ID number/password combination.');
    }

    public function logout()
    {
    	 Auth::logout();
         return redirect('/assistantdeanlogin');
    }
}
