<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BacksiteController extends Controller
{
    public function __construct()
    {
        if (!Gate::allows('access-backsite')) {
            return \response(403);
        }
    }

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
