<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function register(Request $request){
        $request->validate([
                'username'                      => 'required',
                'email'                         => 'required|email',
                'password'                      => 'required|min:8',
                'cpassword'                     => 'required|same:password',
        ]);

                $otp                            = random_int(100000, 999999);


                $name                           = $request->username;
                $email                          = $request->email;
                $hashedPassword                 = Hash::make($request->password);

            if (DB::table('passbooks')->where('user_email', $email)->exists()) {
                    return redirect('/register')->with('error', 'Email already exists');
            } else {
                Mail::to($email)->send(new UserMail($otp));
                    Session([           'name'          => $name,
                                        'email'         => $email, 
                                        'password'      => $hashedPassword,
                                        'otp'           => $otp
            
                            ]);
                    return redirect('/verification');
            }      
    }

    public function verify(Request $request){
        $request->validate([
                'otp'                           => 'required|digits:6'
        ]);
                $otp                            = $request->otp;

                if($otp == session('otp')){
                    $insertData =           DB::table('passbooks')
                                                        ->insert(
                                                        array(
                                                            'name'                  => session('name'),
                                                            'user_email'            => session('email'),
                                                            'password'              => session('password')
                                                            )
                    );

                    Session::flush();
                    if($insertData){
                        return redirect('/')->with('messege','Registartion Successful. Pleace Login');
                    }
                    else{
                        return redirect('/register')->with('error','Registration Unsuccessful');
                    }
                }
                else{
                    return redirect('/verification')->with('messege','OTP verified Unsuccessfully');
                }
    }

    public function login(Request $request){
        $request->validate([
                'username'                      => 'required|email',
                'password'                      => 'required'
        ]);

                $email                          = $request->username;
                $password                       = $request->password;

                $userData                       = DB::table('passbooks')->where('user_email', $email)->first();

                if ($userData){
                    if(Hash::check($password, $userData->password)){
                        session([
                                'name'          => $userData->name,
                                'email'         => $userData->user_email
                        ]);
                        return redirect('/Dashboard');
                    }else{
                        return redirect('/')->with('messege','Password is incorrect');
                    }
                }else{
                    return redirect('/')->with('messege','Email is not found');
                }
    }

    public function makeRevenue(Request $request){
        $request->validate([
                'date'                          => 'required',
                'amount'                        => 'required',
                'description'                   => 'required'
        ]);

                $email                          = $request->email;
                $date                           = $request->date;
                $amount                         = $request->amount;
                $description                    = $request->description;

                $insertData                     = DB::table('revenues')
                                                            ->insert(
                                                                array(
                                                                        'user-email'        => $email,
                                                                        'description'       => $description,
                                                                        'date'              => $date,
                                                                        'amount'            => $amount
                                                                )
                                                            );
                if($insertData){
                    $updateData                 = DB::table('passbooks')
                                                            ->where('user_email', $email)
                                                            ->update(
                                                                array(
                                                                        'balance'           => DB::raw('balance + '.$amount)
                                                                )
                                                            );
                    if($updateData){
                        return redirect('/make-revenue')->with('messege','Revenue Successfully Added.');
                    }
                }else{
                    return redirect('/make-revenue')->with('messege','Revenue Collection Failed.');
                }
    }

    public function makeExpenditure(Request $request){
        $request->validate([
                'date'                          => 'required',
                'amount'                        => 'required',
                'description'                   => 'required'
        ]);

                $email                          = $request->email;
                $date                           = $request->date;
                $amount                         = $request->amount;
                $description                    = $request->description;

                $insertData                     = DB::table('expenditurs')
                                                            ->insert(
                                                                array(
                                                                        'user-email'        => $email,
                                                                        'description'       => $description,
                                                                        'date'              => $date,
                                                                        'amount'            => $amount
                                                                )
                                                            );
                if($insertData){
                    $updateData                 = DB::table('passbooks')
                                                            ->where('user_email', $email)
                                                            ->update(
                                                                array(
                                                                        'balance'           => DB::raw('balance - '.$amount)
                                                                )
                                                            );
                    if($updateData){
                        return redirect('/make-expenditure')->with('messege','Expenditure Successfully Added.');
                    }
                }else{
                    return redirect('/make-expenditure')->with('messege','Expenditure Collection Failed.');
                }
    }

    public function forget(Request $request){
        $request->validate([
                'email'                         => 'required|email',
                'newPassword'                   => 'required|min:8',
                'confirmPassword'               => 'required|same:newPassword'
        ]);
                $email                          = $request->email;
                $password                       = $request->newPassword;
                $hashedPassword                 = Hash::make($password);
                $otp                            = random_int(100000, 999999);

                Mail::to($email)->send(new UserMail($otp));
                Session([
                        'email'                 => $email,
                        'password'              => $hashedPassword,
                        'otp'                   => $otp
                    ]);
                return redirect('/forgetVerification');
    }
    public function forgetverify(Request $request){
        $request->validate([
                'otp'                           => 'required'
        ]);

                $otp                            = $request->otp;

                if ($otp == session('otp')){
                   $updateData = DB::table(('passbooks'))
                                                ->where('user_email', session('email'))
                                                ->update(
                                                        array(
                                                            'password'          => session('password')
                                                        )
                                                    );
                    
                    if($updateData){
                        Session::flush();
                        return redirect('/')->with('messege','Password Updated Successfully. Please Login');
                    }else{
                        return redirect('/forgetVerification')->with('messege','Password Update Failed');
                    }
                }else{
                    return redirect('/forgetVerification')->with('messege','OTP Verified Unsuccessfully');
                }
    }
}
