<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\InstructorSchedule;
use App\Role;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;


class AdminController extends Controller
{

    private $instructorSchedule;

    public function __construct(InstructorSchedule $instructorSchedule)
    {
        $this->instructorSchedule = $instructorSchedule;
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
       return view('admins.index');
    }

    public function preenrol()
    {
        return view('admins.pre-enrol');
    }

    public function addgrades()
    {
    	return view('admins.addgrades');
    }

    public function addinstructor()
    {
    	return view('admins.addinstructor');
    }

    public function storeinstructor(Request $request)
    {
        $request->validate([
            'name'                    => 'required',
            'id_number'               => 'required|unique:instructors',
            'password'                => 'required',
            'education_qualification' => 'required',
            'major'                   => 'required',
            'position'                => 'required',
            'status'                  => 'required',
        ]);

        $instructor_create = Instructor::create(
            [
                'name'                    => $request->name,
                'id_number'               => $request->id_number,
                'education_qualification' => $request->education_qualification,
                'major'                   => $request->major,
                'position'                => $request->position,
                'status'                  => $request->status,
            ]
        )->save();

        if ($instructor_create) {
            $user = User::create([
                'name'      => $request->name,
                'id_number' => $request->id_number,
                'password'  => bcrypt($request->password),
            ]);
            $user->save();
            $user->roles()->attach($user->getRole('Instructor'));
            return redirect()->back()->with('status','Successfully add new instructor');
        }
    }

    public function schedule()
    {
        $schedules = InstructorSchedule::where('status','active')->get();
        $deleted_schedules = InstructorSchedule::where('status','delete')->get();
        return view('admins.schedule',compact('schedules','deleted_schedules'));
    }

    public function scheduling()
    {
    	return view('admins.scheduling');
    }

    public function restoreschedule($id)
    {
        $schedule = InstructorSchedule::where('id',$id)->first();
        $schedule->status = 'active';
        $schedule->save();
        if ($schedule) {
            return response()->json(['success' => true]);
        }

    }

    public function storeschedule(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time'   => 'required',
            'days'       => 'required',
            'room'       => 'required',
            'subject'    => 'required',
            'instructor' => 'required',
        ]);

        $is_exists = $this->instructorSchedule->checkSchedule([
             'start_time' => $request->start_time,
             'end_time'   => $request->end_time,
             'days'       => $request->days,
             'room'       => $request->room,
             'instructor' => $request->instructor,
        ]);

        if (!$is_exists) {
            $user = InstructorSchedule::create([
                 'start_time' => $request->start_time,
                 'end_time'   => $request->end_time,
                 'days'       => $request->days,
                 'room'       => $request->room,
                 'subject'    => $request->subject,
                 'instructor' => $request->instructor,
            ])->save();
            return redirect()->back()->with('status','Successfully add new schedule for ' . $request->instructor);
        } else {
            return redirect()->back()->withErrors('This schedule is already exists');
        }
    }

    public function instructors()
    {
        $instructors = Instructor::all();
        return view('admins.list-instructors',compact('instructors'));
    }

    public function instructorinfo($id)
    {
        return response()->json(Instructor::where('id',$id)->first());
    }

    public function updateinstructorinfo(Request $request)
    {
        $instructor_info = Instructor::where('id_number',$request->id_number)->first();
        $instructor_info->id_number = $request->id_number;
        $instructor_info->name = $request->name;
        $instructor_info->education_qualification = $request->education_qualification;
        $instructor_info->position = $request->position;
        $instructor_info->status = $request->status;
        $instructor_info->mobile_number = $request->mobile_number;
        $instructor_info->active = $request->active;
        $instructor_info->save();

        if ($instructor_info) {
            return response()->json(['success' => true]);
        }
    }

    public function updatescheduleinfo(Request $request)
    {
        $schedule_info = instructorSchedule::where('id',$request->id)->first();
        $schedule_info->start_time = $request->start_time;
        $schedule_info->end_time = $request->end_time;
        $schedule_info->instructor = $request->instructor;
        $schedule_info->days = $request->days;
        $schedule_info->subject = $request->subject;
        $schedule_info->save();
        if ($schedule_info) {
            return response()->json(['success' => true]);
        }
    }

    public function deleteschedule(Request $request){
        $schedule_info = InstructorSchedule::where('id',$request->id)->first();
        $schedule_info->status = "delete";
        $schedule_info->save();
        return response()->json(['success' => true]);
    }

    public function getschedule($id)
    {
        return response()->json(InstructorSchedule::where('id',$id)->first());
    }

    public function login()
    {
        return view('admins.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/adminlogin');
    }

    public function sendschedule($number)
    {
        return view('admins.send',compact('number'));
    }

    public function sendtoschedule(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'message'      => 'required'
        ]);
        $config        = Configuration::getDefaultConfiguration();
        $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUzODg4MTY4NSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjQ3NTk1LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.89tHnbHlSQyrSDLjhKl-7UdPzWxSkkBK2I5n0nnEc1U');
        $apiClient     = new ApiClient($config);
        $messageClient = new MessageApi($apiClient);

        // Sending a SMS Message
        $sendMessageRequest1 = new SendMessageRequest([
            'phoneNumber' => $request->phone_number,
            'message' => $request->message,
            'deviceId' => 103181
        ]);
        {
             $sendMessages = $messageClient->sendMessages([
                $sendMessageRequest1,
            ]);
        }
        if ($sendMessages) {
            return redirect()->back()->with('status','Successfully send a message to ' . $request->phone_number);
        }
    }

    public function checkLogin(Request $request)
    {
        $validatedData = $request->validate([
            'id_number' => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('id_number', 'password');
        $admin = User::where('id_number',$request->id_number)->first();
        if (Auth::attempt($credentials) && $admin->hasRole('Admin')) {
            // Authentication passed...
            return redirect()->intended('/admin/index');
        }
        return Redirect::back()->withInput()->withErrors('Wrong ID number/password combination.');
    }
}
