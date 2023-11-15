<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index(){
        $teacher= DB::table('teachers')->latest()->get();
        return view('dashboard.pages.users.teacher.index', compact('teacher'));
    }
    //teacher create page
    public function create(){
        return view('dashboard.pages.users.teacher.create');
    }

    public function validatewithlogin(array $fields, array $rules, $request)
    {
        $validate = Validator::make($request->all(), $fields, $rules);
        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ]);
        }
    }

    //store teacher info
    public function store(Request $request){

       
        
        $name= $request->name;
        $email= $request->email;
        $username= $request->username;
        $phone= $request->phone;
        $password= Hash::make($request->password);

        
        if (empty($request->name)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'Please enter a name',
            ]);
        }
        if (empty($request->email)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'Please enter a email',
            ]);
        }
        
        
        if (empty($request->username)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'Please enter a username',
            ]);
        }
        if (empty($request->phone)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'Please enter a phone',
            ]);
        }
        if (empty($request->password)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'Please enter a password',
            ]);
        }
        $teacher=DB::table('teachers')->get();
        
        $teacher_email_arr=[];
        $teacher_phone_arr=[];
        $teacher_username_arr=[];
        foreach ($teacher as $teachers) {
           
            array_push($teacher_email_arr, $teachers->email);
            array_push($teacher_phone_arr, $teachers->phone);
            array_push($teacher_username_arr, $teachers->username);
        }
        if (in_array($request->email, $teacher_email_arr)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'This email is already used',
            ]);
        }
        if (in_array($request->username, $teacher_username_arr)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'This username is already used',
            ]);
        }
        if (in_array($request->phone, $teacher_phone_arr)) {
            return response()->json([
                'status' => 'errors',
                'message' => 'This phone number is already used',
            ]);
        }

        Teacher::create([
            'name' =>$name,
            'email' =>$email,
            'username' =>$username,
            'phone' =>$phone,
            'password' =>$password,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully add a user ',
        ]);
    }
}
