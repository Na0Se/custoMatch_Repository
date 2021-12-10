<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
    public function index()
    {
        //$users = User::all(); 
        //$keyword = $request->input('q');
        $query = User::query();

        /*if(!empty($keyword))
        {
            $query->where('title','like','%'.$keyword.'%')->orWhere('body','like','%'.$keyword.'%');
        }
        */
        $users = $query->orderBy('created_at','desc')->paginate(10);
        return view('home', ['users' => $users]);//->with('keyword',$keyword);
        //return view('home', compact('users')); 
    }
}
