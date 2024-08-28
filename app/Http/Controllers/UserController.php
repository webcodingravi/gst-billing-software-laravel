<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        
    
        return view('my-account.my-account',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {

        $rules =  [
            'name' => 'required',
            'mobile' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id.',id',

   ];

   $validator = Validator::make($request->all(),$rules);

   if($validator->fails()) {
    return redirect()->back()->withInput()->withErrors($validator);
   }
   if(!empty($request->image)) {
       $rules['image'] = 'image';
   }

   

        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        if(!empty($request->image)) {
            // old file deleted
            File::delete(public_path('uploads/profile_pic/'.$user->image));
            File::delete(public_path('uploads/profile_pic/thumb/'.$user->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/profile_pic/'),$imageName);
            $user->image = $imageName;
            $user->save();


            // profile pic thumb
            $imagePath = Image::read(public_path('uploads/profile_pic/'.$imageName));
            $imageSave = public_path('uploads/profile_pic/thumb/'.$imageName);
            $imagePath->cover(150,150);
            $imagePath->save($imageSave);
        }
     
         return redirect()->back()->with('success', 'User Updated Successfully');

      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function UpdatePassword(Request $request) {
        $validator = Validator::make($request->all(),[
              'old_password' => 'required',
              'new_password' => 'required',
              'confirm_password' => 'required|same:new_password'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // check old password
        if(Hash::check($request->old_password, Auth::user()->password) == false) {
            return redirect()->back()->with('error', 'Your old password is incorrect');
        }

        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();


        return redirect()->back()->with('success', 'Your Password updated successfully');
    }

}
