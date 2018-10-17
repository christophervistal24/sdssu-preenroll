<?php


	Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/about',[
			'uses' => 'Pages\AboutUsController@about',
	]);

	//login route for admin
	Route::get('/adminlogin' , [
		'uses' => 'Admin\AdminController@login',
	]);

	Route::post('/adminlogin',[
		'uses' => 'Admin\AdminController@checkLogin',
	]);

/**
 * Route for Admin
 */



Route::group(['prefix' => 'admin','middleware' => ['roles']], function() {
	Route::get('/',['uses'                    =>'Admin\AdminController@index','roles' => ['Admin']]);
	Route::get('/index',['uses'                    =>'Admin\AdminController@index','roles' => ['Admin']]);
	Route::post('/index',['uses'                    =>'Admin\AdminController@changesemester','roles' => ['Admin']]);
	Route::get('/pre-enrol',['uses'                =>'Admin\AdminController@preenrol','roles' => ['Admin']]);
	Route::get('/addgrades',['uses'                =>'Admin\AdminController@addgrades','roles' => ['Admin']]);
	Route::get('/schedule',['uses'                 =>'Admin\AdminController@schedule','roles' => ['Admin']]);
	Route::get('/scheduling',['uses'               =>'Admin\AdminController@scheduling','roles' => ['Admin']]);
	Route::post('/scheduling',['uses'              =>'Admin\AdminController@storeschedule','roles' => ['Admin']]);
	Route::get('/addinstructor',['uses'            =>'Admin\AdminController@addinstructor','roles' => ['Admin']]);
	Route::post('/addinstructor',['uses'           =>'Admin\AdminController@storeinstructor','roles' => ['Admin']]);
	Route::get('/addstudent',['uses'            =>'Admin\AdminController@addstudent','roles' => ['Admin']]);
	Route::post('/addstudent',['uses'            =>'Admin\AdminController@storestudent','roles' => ['Admin']]);
	Route::get('/studentsubject/{student}',['uses'            =>'Admin\AdminController@studentaddsubject','roles' => ['Admin']]);
	Route::get('/liststudents',['uses'            =>'Admin\AdminController@students','roles' => ['Admin']]);
	Route::post('/studentsubjectstore',['uses' => 'Admin\AdminController@storestudentsubject','roles' => ['Admin']]);
	Route::get('/instructorinfo/{id}',['uses'      =>'Admin\AdminController@instructorinfo','roles' => ['Admin']]);
	Route::post('/instructorinfo/{id}',['uses'     =>'Admin\AdminController@updateinstructorinfo','roles' => ['Admin']]);
	Route::get('/getscheduleinfo/{id}',['uses'     =>'Admin\AdminController@getschedule','roles' => ['Admin']]);
	Route::post('/updatescheduleinfo/{id}',['uses' =>'Admin\AdminController@updatescheduleinfo','roles' => ['Admin']]);
	Route::post('/deleteschedule/{id}',['uses'     =>'Admin\AdminController@deleteschedule','roles' => ['Admin']]);
	Route::post('/restoreschedule/{id}',['uses'    =>'Admin\AdminController@restoreschedule','roles' => ['Admin']]);
	Route::post('/permanentdelete/{id}',['uses'    =>'Admin\AdminController@permanentdelete','roles' => ['Admin']]);
	Route::get('/listofrooms',['uses'              => 'Admin\AdminController@listofrooms','roles' => ['Admin']]);
	Route::post('/listofrooms',['uses'             => 'Admin\AdminController@addroom','roles' => ['Admin']]);
	Route::post('/deleteroom/{id}',['uses'             => 'Admin\AdminController@deleteroom','roles' => ['Admin']]);
	Route::get('/subjects',['uses'                 => 'Admin\AdminController@subjects','roles' => ['Admin']]);
	Route::post('/subjectcreate',['uses'                 => 'Admin\AdminController@subjectstore','roles' => ['Admin']]);
	Route::get('/index',['uses'                    =>'Admin\AdminController@index','roles' => ['Admin']]);
	Route::get('/instructors',['uses'              =>'Admin\AdminController@instructors','roles' => ['Admin']]);
	Route::get('/send/{number?}',['uses'           =>'Admin\AdminController@sendschedule','roles' => ['Admin']]);
	Route::post('/send',['uses'                    =>'Admin\AdminController@sendtoschedule','roles' => ['Admin']]);
	Route::get('/accept/preenroll/{student_info}',['uses' => 'Admin\Admincontroller@acceptpreenroll','roles' => ['Admin']]);

	Route::post('/accept/preenroll/{student_info}',['uses' => 'Admin\Admincontroller@storeacceptpreenroll','roles' => ['Admin']]);
	Route::get('/block',['uses' => 'Admin\Admincontroller@blockindex','roles' => ['Admin']]);
	Route::post('/block',['uses' => 'Admin\Admincontroller@submitblock','roles' => ['Admin']]);
	Route::get('/logout',['uses'                   =>'Admin\AdminController@logout','roles' => ['Admin']]);
});


/**
 * Route for student
 */

//login route for student
Route::get('/studentlogin' , [
	'uses' => 'Students\StudentController@login',
]);

Route::post('/studentlogin' , [
	'uses' => 'Students\StudentController@checkLogin',
]);

Route::group(['prefix' => 'student','middleware' => 'roles'], function() {
	Route::get('/preenrol',['uses'=>'Students\StudentController@preenrol','roles' => ['Student']]);
	Route::post('/preenrol',['uses'=>'Students\StudentController@submitpreenrol','roles' => ['Student']]);
	Route::get('/preenroldetails',['uses'=>'Students\StudentController@preenroldetails','roles' => ['Student']]);
	Route::get('/evaluate',['uses'=>'Students\StudentController@evaluate','roles' => ['Student']]);
	Route::get('/schedule',['uses'=>'Students\StudentController@schedule','roles' => ['Student']]);
	Route::get('/index',['uses'=>'Students\StudentController@index','roles' => ['Student']]);
	Route::get('/logout',['uses'=>'Students\StudentController@logout','roles' => ['Student']]);
});

/**
 * Route for parent
 */

//login route for parent
Route::get('/parentlogin' , [
	'uses' => 'Parents\ParentsController@login',
]);

Route::post('/parentlogin' , [
	'uses' => 'Parents\ParentsController@checkLogin',
]);


Route::group(['prefix' => 'parent','middleware' => 'roles'], function() {
	Route::get('/sendsms',[	'uses' => 'Parents\ParentsController@sendsms','roles' => ['Parent']]);
	Route::get('/viewgrade',['uses' => 'Parents\ParentsController@viewgrade','roles' => ['Parent']]);
	Route::get('/index',['uses' => 'Parents\ParentsController@index','roles' => ['Parent']]);
	Route::get('/logout',['uses' => 'Parents\ParentsController@logout','roles' => ['Parent']]);
});

/**
 * Route for instructor
 */


//login route for instructor
Route::get('/instructorlogin' , [
	'uses' => 'Instructors\InstructorController@login',
]);

Route::post('/instructorlogin' , [
	'uses' => 'Instructors\InstructorController@checkLogin',
]);

Route::group(['prefix' => 'instructor','middleware' => 'roles'], function() {
	Route::get('/index', ['uses' => 'Instructors\InstructorController@index','roles' => ['Instructor']]);
	Route::get('/schedule',
			 ['uses' => 'Instructors\InstructorController@schedule','roles' => ['Instructor']
			]);
    Route::get('/sendsms', ['uses' => 'Instructors\InstructorController@sendsms','roles' => ['Instructor']]);
    Route::get('/students/{first_subject}/{second_subject?}', ['uses' => 'Instructors\InstructorController@students','roles' => ['Instructor']]);
    Route::post('/addstudentgrade/', ['uses' => 'Instructors\InstructorController@addstudentgrade','roles' => ['Instructor']]);
    Route::get('/logout', ['uses' => 'Instructors\InstructorController@logout','roles' => ['Instructor']]);
});

/*ASSISTANT DEAN*/
Route::get('/assistantdeanlogin',['uses' => 'Deans\AssistantDeanController@showLoginForm']);
Route::post('/assistantdeanlogin',['uses' => 'Deans\AssistantDeanController@submitlogin']);
Route::group(['prefix' => 'assistantdean','middleware' => 'roles'], function() {
	Route::get('/index', ['uses' => 'Deans\AssistantDeanController@index','roles' => ['Admin','Assistant Dean']]);
	Route::get('/assign/{schedule_info}', ['uses' => 'Deans\AssistantDeanController@assign','roles' => ['Assistant Dean']]);
	Route::post('/assign/{schedule_info}', ['uses' => 'Deans\AssistantDeanController@submitassign','roles' => ['Assistant Dean']]);
	Route::get('/instructors', ['uses' => 'Deans\AssistantDeanController@instructors','roles' => ['Assistant Dean']]);
    Route::get('/logout', ['uses' => 'Deans\AssistantDeanController@logout','roles' => ['Assistant Dean']]);
});

Route::get('/test','User\UserController@index');
