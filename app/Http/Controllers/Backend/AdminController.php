<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

         // return $this->data['chart'];

        return view('backend.dashboard');
    }

    public function clearNotif(){
        
        Auth::guard('admin')->user()->unreadNotifications()->update(['read_at' => now()]);
    }
}
