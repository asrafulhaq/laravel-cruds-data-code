<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Mail\StaffAccountMail;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Notifications\StaffConfirmNotification;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::latest() -> paginate(10);
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validation 
        $this -> validate($request, [
            'name'          => ['required'],
            'email'         => ['required','unique:staff'],
            'cell'          => ['required','unique:staff'],
        ]);

        // Photo Upload 
        if( $request -> hasFile('photo') ){

            // get image path 
            $img = $request -> file('photo');

            // create a unique file name 
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();

            // intervension image setup 
            $inter = Image::make( $img -> getRealPath());

            // crete a water mark 
            $water = Image::make('https://upload.wikimedia.org/wikipedia/commons/8/82/ONE-Logo.png');
            $water -> opacity(30);
            $inter -> insert($water, 'center');
            
            // upload image to storage path 
            $inter -> save( storage_path('app/public/staff/') . $file_name);


            // $img -> move(storage_path('app/public/staff/'), $file_name);




        }else {
            $file_name = 'avatar.png';
        }


        // Send staff data to database 
        $staff = Staff::create([
            'name'      => $request -> name, 
            'email'      => $request -> email, 
            'cell'      => $request -> cell, 
            'photo'      => $file_name, 
        ]);
 
        // mail for confirm
        $data = [
            'name'      => $request -> name,
            'email'      => $request -> email,
            'cell'      => $request -> cell,
            'photo'      => $file_name,
        ];

        $staff -> notify( new StaffConfirmNotification($data));
        

        
        // Mail::to($request -> email) -> send( new StaffAccountMail($data));




        // return back 
        return back() -> with('success', 'Staff data added');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_data = Staff::findOrFail($id);

        // Validation 
        $this -> validate($request, [
            'name'          => ['required'],
            'email'         => ['required'],
            'cell'          => ['required'],
        ]);

        $update_data -> update([
            'name'      => $request -> name,
            'email'      => $request -> email,
            'cell'      => $request -> cell,
        ]);
        return back() -> with('success', 'Staff data Updated successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Staff::findOrFail($id);
        $delete_data -> delete();
        return back() -> with('success', 'Staff data deleted successfull');

    }
}
