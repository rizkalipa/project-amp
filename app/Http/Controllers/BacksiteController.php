<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BacksiteController extends Controller
{
    public function index()
    {
        return view('layouts.master');
    }

    public function login()
    {
        return view('backsite.login');
    }

    public function register()
    {
        return view('backsite.register');
    }
}
