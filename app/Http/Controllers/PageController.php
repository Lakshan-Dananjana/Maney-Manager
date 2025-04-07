<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function verify(){
        return view('verification');
    }
    public function forget(){
        return view('forget');
    }
    public function dashboard(){
        if(!session('email')){
            return redirect('/')->with('messege', 'Please login first');
        }
        return view('Dashboard');
    }
    public function makeRevenue(){
        if(!session('email')){
            return redirect('/')->with('messege', 'Please login first');
        }
        return view('makeRevenue');
    }
    public function revenueHistory(){
        if(!session('email')){
            return redirect('/')->with('messege', 'Please login first');
        }

            $revenue                    = DB::table('revenues')
                                                    ->where('user-email', session('email'))
                                                    ->get();

            $totalRevenue               = DB::table('revenues')
                                                    ->where('user-email', session('email'))
                                                    ->sum('amount');

        if($revenue){
            return view('revenueHistory')->with('revenue', $revenue)->with('totalRevenue', $totalRevenue);
        }
        
    }
    public function makeExpenditure(){
        if(!session('email')){
            return redirect('/')->with('messege', 'Please login first');
        }
        return view('makeExpenditure');
    }
    
    public function expenditureHistory(){
        if(!session('email')){
            return redirect('/')->with('messege', 'Please login first');
        }

            $expenditure                = DB::table('expenditurs')
                                                    ->where('user-email', session('email'))
                                                    ->get();

            $totalExpenditure           = DB::table('expenditurs')
                                                    ->where('user-email', session('email'))
                                                    ->sum('amount');

        if($expenditure){
            return view('expenditureHistory')->with('expenditure', $expenditure)->with('totalExpenditure', $totalExpenditure);
        }
    }
        
    public function logout(){
        session()->flush();
        return redirect('/')->with('messege', 'Logout Successful');
    }
    public function balance(){
        if(!session('email')){
            return redirect('/')->with('messege','Please login first');
        }
        $balance = DB::table('passbooks')->where('user_email', session('email'))->get()->first();

        if($balance){
            return view('balance')->with('balance', $balance);
        }
        
    }
    public function forgetverify(){
        return view('varificationB');
    }
}
