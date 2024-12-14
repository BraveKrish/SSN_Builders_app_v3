<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return view('Dashboard.admin');
            } else if ($role == 'user') {
                return view('Dashboard.user.user');
            } else {
                return redirect()->back();
            }
        }
        // return view('Dashboard.admin');
    }

    public function users(){
        return view('Dashboard.user.user');
    }

    public function post()
    {
        return view('Dashboard.posts');
    }
}
