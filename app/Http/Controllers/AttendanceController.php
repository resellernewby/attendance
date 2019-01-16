<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function list()
    {
        $today = Carbon::today()->toDateString();

        return Attendance::where('tanggal', $today)->with('user')->get();
    }

    public function listChecked()
    {
        $today = Carbon::today()->toDateString();

        return Attendance::where('tanggal', $today)
            ->where('presence', 'ya')
            ->with('user')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attendance');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::today()->toDateString();

        //return $today->toDateString();

        $tanggal = Attendance::where('tanggal', $today)->get();        

        if($tanggal->count() === 0){
            $users = User::all();
        
            foreach($users as $user){
                $attendance = new Attendance;
                $attendance->user_id = $user->id;
                $attendance->tanggal = $today;
                $attendance->save();
            }

            return 'berhasil';
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $attendance = Attendance::findOrFail($attendance->id);
        if($attendance->presence == 'tidak'){
            $attendance->presence = 'ya';
            $attendance->save();
        } else {
            $attendance->presence = 'tidak';
            $attendance->save();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
