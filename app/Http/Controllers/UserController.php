<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.new_user');
    }

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
    protected $fillable = [
        'name',
        'paterno',
        'materno',
        'direccion',
        'carnet',
        'telefono',
        'estado',
        'email',
        'password'
    ];
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:55',
            'paterno' => 'required|string|max:55',
            'materno' => 'required|string|max:55',
            'direccion' => 'required|string|max:155',
            'carnet' => 'required|string|max:10|unique:users,carnet',
            'telefono' => 'required|string|max:10|unique:users,telefono',
            'estado' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }

}
