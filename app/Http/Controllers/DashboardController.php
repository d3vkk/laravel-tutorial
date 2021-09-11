<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Include User Model using namespaces
use App\User;


class DashboardController extends Controller
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
    public function index()
    {
        //Retrieves user_id from the user table
        $user_id = auth()->user()->id;
        //Finds user by id
        $user = User::find($user_id);
        //Opens the dashboard and passes in the
        //posts for the user found
        return view('dashboard')->with('posts', $user->posts);
    }
}
