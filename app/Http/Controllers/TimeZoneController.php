<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Auth;

class TimeZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexTimeZone()
    {
        $timezones = Timezone::all();
        return view('timezone.index', compact('timezones'));
    }

    public function setTimeZone(Request $request)
    {	
        $user = Auth::user();
        $user->timezone = $request->timezone;
        $user->save();
        return redirect()->back();
    }

}
