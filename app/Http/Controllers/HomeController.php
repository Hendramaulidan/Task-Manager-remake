<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Task;
use App\process;
use App\Column;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $start = process::all()->where('user_id',Auth::user()->id)->where('status','Start');
        $process = process::all()->where('user_id',Auth::user()->id)->where('status','process');
        $finish = process::all()->where('user_id',Auth::user()->id)->where('status','finish');
        $custom = Column::all()->where('user_id',Auth::user()->id);
        return view('home',compact('start','process','finish','custom'));
    }

    //UNTUK CARD TASK


    public function newCard(Request $request)
    {
        Column::insert([
            'user_id' => Auth::user()->id,
           'status' => $request->input('cardName'),
           'created_at' => now()
        ]);
        return redirect('/home');
    }
    public function newTask(Request $request,$id)
    {
        Task::insert([
            'user_id' => Auth::user()->id,
           'kegiatan' => $request->input('taskName'),
           'column_id' => $id,
           'updated_at' => Carbon::now()
        ]);
        return redirect('/home');
    }
    public function deleteCard($id)
    {
        Column::find($id)->delete();
        return redirect('home');
    }



    //akhir dari Card Task



    //Untuk PROCESS TASK

    public function insertTask(Request $request)
    {
        process::insert([
            'status' => 'Start',
            'kegiatan' => $request->input('taskName'),
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect('home');
    }

    public function deleteTask($id)
    {
        process::find($id)->delete();
        return redirect('home');
    }
    public function process($id)
    {
        process::find($id)->update([
            'status'=> 'process',
            'updated_at' => Carbon::now()
        ]);
        return redirect('home');
    }
    public function finish($id)
    {
        process::find($id)->update([
            'status'=>'finish',
            'updated_at' => Carbon::now()
        ]);
        return redirect('home');
    }




}
