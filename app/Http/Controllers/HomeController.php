<?php

namespace App\Http\Controllers;

use App\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('isActive');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.index');
        }elseif(Auth::user()->role === 'user'){
            $assigned_leads = Prospect::where('assigned', Auth::id())->get();
            return view('user.index', ['assigned_leads' => $assigned_leads]);
        }
        
        return view('home');
    }
}
