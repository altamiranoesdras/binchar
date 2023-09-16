<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
        //$this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {


        return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('admin.users.profile');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function calendar()
    {
        return view('calendar');
    }
}
