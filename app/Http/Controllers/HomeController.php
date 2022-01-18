<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timezone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Models\Lang;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        return view('home');
    }

    public function lang_change(Request $request)
    {
        // App::setLocale($request->lang);
        // session()->put('locale', $request->lang);
        // return view('layouts.includes.navbar');
        // return redirect()->back();

        $user =Auth::user();
        $user->lang = $request->lang;
        $user->save();
        return redirect()->back();
    }
}
