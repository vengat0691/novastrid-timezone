<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DateTimeZone;
use Carbon;
use Auth;
use App\Models\User;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if((Route::input('timezone')!='null')){
            $routeInput = Route::input('timezone');
            $currentTimeZone = str_replace('_', '/', $routeInput);
        }else{
            if(Auth::user()){
                if((Route::input('timezone')=='null')||(Route::input('timezone')=='')||(Route::input('timezone')==NULL)){
                    $currentTimeZone =  Auth::user()->time_zone;
                }    
            }else{
                $currentTimeZone = config('app.timezone');
            }
        }
        $currenttime = Carbon\Carbon::now($currentTimeZone);
        $todayTime = $currenttime->toDateTimeString();
        //to update user timezone
        Auth::user()->update(['time_zone' => $currentTimeZone]);
        return view('time',compact('currentTimeZone','currenttime','todayTime'));
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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
