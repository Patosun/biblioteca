<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        // $users = User::select(
        //     'code',
        //     'name',
        //     'paterno',
        //     'materno',
        //     'telefono',
        //     'email'
        // ) ->get();
        $users = User::all();
        return view('users.index_user', compact('users'));
    }
}
