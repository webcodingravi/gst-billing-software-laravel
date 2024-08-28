<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function login() {
    return view('login.login');
   }


   public function authenticate(Request $request) {
      $validator = Validator::make($request->all(),[
          'email' => 'required|exists:users,email',
          'password' => 'required'
      ]);

      if($validator->fails()){
         return redirect()->route('login')->withInput()->withErrors($validator);
      }

      if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
      }else{
           return redirect()->route('login')->with('error', 'Either Email/Password is incorrect.');
      }
      
   }



   public function logout() {
      Auth::logout();

      return redirect()->route('login');
   }


  

   public function forgotPassword() {
      return view('login.forgot-password');
   }


   public function processForgotPassword(Request $request) {
      $validator = Validator::make($request->all(),[
           'email' => 'required|email|exists:users,email'
      ]);

      if($validator->fails()) {
         return redirect()->route('forgotPassword')->withInput()->withErrors($validator);
      }

      $token = Str::random(60);
      DB::table('password_reset_tokens')->where('email', $request->email)->delete();

      DB::table('password_reset_tokens')->insert([
         'email' => $request->email,
         'token' => $token,
         'created_at' => now()
      ]);

      // Send Email here
      $user = User::where('email', $request->email)->first();

      $mailData = [
           'token' => $token,
           'user' => $user,
           'subject' => 'You have requested to change your password' 
      ];

      Mail::to($request->email)->send(new ResetPasswordEmail($mailData));

      return redirect()->route('forgotPassword')->with('success', 'Reset Password has been sent to your inbox.');
   }


   public function resetPassword($StrToken) {
      $tokenExist = DB::table('password_reset_tokens')->where('token',$StrToken)->first();

      if($tokenExist== null) {
       return redirect()->back()->with('error', 'Invalid token');
      }

    return view('login.reset-password',[
       'StrToken' => $StrToken
    ]);    
   }



   public function processResetPassword(Request $request) {
      $token = DB::table('password_reset_tokens')->where('token',$request->token)->first();

      if($token == null) {
       return redirect()->route('forgotPassword')->with('error', 'Invalid token');
      }


      $user = User::where('email', $token->email)->first();

      $validator = Validator::make($request->all(),[
       'new_password' => 'required',
        'confirm_password' => 'required|same:new_password'
      ]);

      if($validator->fails()) {
       return redirect()->back()->withInput()->withErrors($validator);
      }

      User::where('email', $token->email)->update([
           'password' => Hash::make($request->new_password)
      ]);

      DB::table('password_reset_tokens')->where('email', $user->email)->delete();


      return redirect()->route('login')->with('success', 'You have successfully changed your password');

   }
   
}
