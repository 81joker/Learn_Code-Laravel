<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cource;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $user_courses = User::findOrFail(1)->courses;
        // return view('home' , compact('user_courses'));
        return view('home');
    }
}
