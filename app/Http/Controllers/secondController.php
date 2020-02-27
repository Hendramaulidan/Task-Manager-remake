<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use App\process;
use App\Task;

class secondController extends Controller
{
    public function index()
    {
    	$history = Task::all()->where('user_id',Auth::user()->id);
        $process = DB::table('processes')->where('user_id',Auth::user()->id)->get();
    	return view('history',compact('history','process'));
    }
    public function calendar()
    {
        return view('calendar');
    }
    public function mail()
    {
    	Mail::to('hendrahacker185@gmail.com')->send(new SendMail());
    	return redirect('/home');
    }
}
