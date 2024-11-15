<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index (){
        $userCount = \App\Models\User::count();
        $orderCount = \App\Models\Order::count();
        $username = Auth::user()->username;
        $level = Auth::user()->level;

        return view ('/dashboard',compact('userCount','orderCount'));
    }

   

}
