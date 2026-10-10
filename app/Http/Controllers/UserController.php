<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.new_user');
    }

    public function index()
    {
        return view('users.index_user');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:55',
            'paterno' => 'required|string|max:55',
            'materno' => 'required|string|max:55',
            'direccion' => 'required|string|max:155',
            'carnet' => 'required|string|max:10|unique:users,carnet',
            'telefono' => 'required|string|max:10|unique:users,telefono',
            'email' => 'required|email|unique:users,email',
        ];
        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'paterno.required' => 'El apellido paterno es obligatorio',
            'materno.required' => 'El apellido materno es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
            'carnet.required' => 'El carnet es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',

            'email.email' => 'Debe ingresar un email valido',


            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'paterno.string' => 'El apellido paterno debe ser una cadena de caracteres',
            'materno.string' => 'El apellido materno debe ser una cadena de caracteres',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres',
            'carnet.string' => 'El carnet debe ser una cadena de caracteres',
            'telefono.string' => 'El teléfono debe ser una cadena de caracteres',
            'email.string' => 'El email debe ser una cadena de caracteres',

            'carnet.unique' => 'El carnet ya existe',
            'telefono.unique' => 'El teléfono ya existe',
            'email.unique' => 'El email ya existe',

            'name.max' => 'El nombre no debe superar los 50 caracteres',
            'paterno.max' => 'El apellido paterno no debe superar los 50 caracteres',
            'materno.max' => 'El apellido materno no debe superar los 50 caracteres',
            'direccion.max' => 'La dirección no debe superar los 155 caracteres',
            'carnet.max' => 'El carnet no debe superar los 10 caracteres',
            'telefono.max' => 'El teléfono no debe superar los 10 caracteres',
        ];
        $request->validate($rules, $messages);
        try {
            $pwd=$request->carnet."*";
            User::create([
                'code' => (string) Str::uuid(),
                'name' => $request->name,
                'paterno' => $request->paterno,
                'materno' => $request->materno,
                'direccion' => $request->direccion,
                'carnet' => $request->carnet,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'estado' => true,
                'password' => Hash::make($pwd),
            ]);
            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');

        } catch (Exception $e) {
            Log::error('Error al registrar usuario: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al registrar el usuario: ' . $e->getMessage());
        }

    }
    public function edit($code)
    {
        $usuario = User::where('code', $code)->firstOrFail();
        return view('users.update_user', compact('usuario'));
    }
    public function update(Request $request, $code)
    {
        $usuario = User::where('code', $code)->firstOrFail();
        $rules = [
            'name' => 'required|string|max:55',
            'paterno' => 'required|string|max:55',
            'materno' => 'required|string|max:55',
            'direccion' => 'required|string|max:155',
            'carnet' => ['required', 'string', 'max:10', Rule::unique('users', 'carnet')->ignore($usuario)],
            'telefono' => ['required', 'string', 'max:10', Rule::unique('users', 'telefono')->ignore($usuario)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($usuario)],
        ];
        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'paterno.required' => 'El apellido paterno es obligatorio',
            'materno.required' => 'El apellido materno es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
            'carnet.required' => 'El carnet es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',

            'email.email' => 'Debe ingresar un email valido',


            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'paterno.string' => 'El apellido paterno debe ser una cadena de caracteres',
            'materno.string' => 'El apellido materno debe ser una cadena de caracteres',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres',
            'carnet.string' => 'El carnet debe ser una cadena de caracteres',
            'telefono.string' => 'El teléfono debe ser una cadena de caracteres',
            'email.string' => 'El email debe ser una cadena de caracteres',

            'carnet.unique' => 'El carnet ya existe',
            'telefono.unique' => 'El teléfono ya existe',
            'email.unique' => 'El email ya existe',

            'name.max' => 'El nombre no debe superar los 50 caracteres',
            'paterno.max' => 'El apellido paterno no debe superar los 50 caracteres',
            'materno.max' => 'El apellido materno no debe superar los 50 caracteres',
            'direccion.max' => 'La dirección no debe superar los 155 caracteres',
            'carnet.max' => 'El carnet no debe superar los 10 caracteres',
            'telefono.max' => 'El teléfono no debe superar los 10 caracteres',
        ];
        $validated = $request->validate($rules, $messages);

        try {
            $usuario->update($validated);
            return redirect() ->route('users.index')->with('success', 'Usuario actualizado correctamente');
        } catch (\Exception $e) {
            return back() ->withInput() ->with('error', 'no se pudo actualizar el usuario');
        }
    }

}
