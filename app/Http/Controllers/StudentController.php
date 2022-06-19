<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Student All data 
     */
    public function index()
    {
        $students =  Student::get();
        return view('student.index', [
            'students'  => $students
        ]); 
    }

    /**
     * Student All data 
     */
    public function create()
    {
        return view('student.create');  
    }

    /**
     * Student Data Store 
     */
    public function store(Request $request)
    {        
        

        // return $request -> all();

        // validation 
        $this -> validate($request, [ 
            'name'  => 'required',
            'email'  => 'required|email|unique:students',
            'cell'  => 'required|starts_with:01,8801,+8801|unique:students',
            'username'  => 'required|min:6|max:10|unique:students',
            'edu'  => 'required',
        ],[
           'name.required'  => 'নামের ঘর টি পুরোন করুন',
           'email.email'  => 'ইমেইল টি সঠিক নয়',
           'email.required'  => 'ইমেইলের ঘরটি পূরণ করুন',
        ]);


 
        // upload photo
        if( $request -> hasFile('photo') ){

            $img = $request -> file('photo');
            $file_name = md5(time().rand()) .'.'. $img -> clientExtension();
            $img -> move(storage_path('app/public/students/'), $file_name);   

        }else {
            $file_name = null;
        }


        // data store 
        Student::create([
            'name'          => $request -> name,
            'email'         => $request -> email,
            'cell'          => $request -> cell,
            'username'      => $request -> username,
            'education'     => $request -> edu,
            'age'           => $request -> age,
            'gender'        => $request -> gender,
            'courses'       => json_encode($request -> course),
            'photo'         => $file_name
        ]);


        // back 
        return back() -> with('success','Student data added successful');



        
    }

    /**
     * Student All data 
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', [
            'student'   => $student
        ]);  
    }

    /**
     * Student Data Delete 
     */
    public function destroy($id)
    {

        $delete_data = Student::findOrFail($id);
        $delete_data -> delete();
        return back() -> with('success','Student data deleted successful');
        
    }

    /**
     * Edit 
     */
    public function edit($id)
    {
        $edit_data = Student::findOrFail($id);
        return view('student.edit', [
            'edit_data' => $edit_data,
            'courses'   => ['MERN Stack Devs','NFT Devs','BlockChain Devs','Laravel Devs','Django Devs','React Devs','Native Apps Devs']
        ]);
    }
    


    /**
     * Update student data 
     */
    public function update(Request $request, $id)
    {

        $update_data = Student::findOrFail($id);

        if( $request -> hasFile('new_photo') ){
            $img = $request -> file('new_photo');
            $file_name = md5(time().rand()) .'.'. $img -> clientExtension();
            $img -> move(storage_path('app/public/students/'), $file_name);

            unlink('storage/students/' . $request -> old_photo );
            

        }else {
            $file_name = $request -> old_photo;
        }




        $update_data -> update([
            'name'              => $request -> name,
            'email'             => $request -> email,
            'cell'              => $request -> cell,
            'username'          => $request -> username,
            'education'         => $request -> edu,
            'courses'           => json_encode($request -> course),
            'gender'            => $request -> gender,
            'photo'             => $file_name,
        ]);

        return back() -> with('success', 'Student data updated sucessful');

    }
    
}



