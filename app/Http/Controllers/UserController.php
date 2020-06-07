<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\User::get();

        return view('backsite.users.index', ['users' => $users]);
    }
}
