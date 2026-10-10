<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class ListaUsuarios extends Component
{
    use WithPagination;

    public $search = '';
    public $n_registros = 10;
    public $modal = false;
    public $name='';
    public $paterno='';
    public $materno='';
    public $carnet='';
    public $telefono='';
    public $email='';
    public $direccion='';

    protected $rules = [
        'name' => 'required|string|max:55',
        'paterno' => 'required|string|max:55',
        'materno' => 'required|string|max:55',
        'direccion' => 'required|string|max:155',
        'carnet' => 'required|string|max:10|unique:users,carnet',
        'telefono' => 'required|string|max:10|unique:users,telefono',
        'email' => 'required|email|unique:users,email',
    ];
    protected $messages = [
        'name.required' => 'El nombre es obligatorio',
        'paterno.required' => 'El apellido paterno es obligatorio',
        'materno.required' => 'El apellido materno es obligatorio',
        'direccion.required' => 'La dirección es obligatoria',
        'carnet.required' => 'El carnet es obligatorio',
        'telefono.required' => 'El teléfono es obligatorio',
        'email.required' => 'El email es obligatorio',

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

    public function cambiarEstado($code)
    {
        $usuario = User::where('code', $code)->first();
        if ($usuario->estado == 1) {
            $usuario->estado = 0;
        } else {
            $usuario->estado = 1;
        }
        $usuario->save();
    }

    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
        $this->clear();
    }
    public function clear()
    {
        $this->reset(
            ["name", "paterno", "materno", "carnet", "telefono", "email", "direccion"]
        );
        $this->resetValidation();
    }
    public function guardar()
    {
        $this->validate();
        User::create([
            "code" => (string) Str::uuid(),
            "name" => $this->name,
            "paterno" => $this->paterno,
            "materno" => $this->materno,
            "carnet" => $this->carnet,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "direccion" => $this->direccion,
            "estado" => 1,
            "password" => Hash::make($this->carnet."*"),
        ]);
        $this->closeModal();
    }
    public function render()
    {
        $users = User::select(
        "code",
        "name",
        "paterno",
        "materno",
        "carnet",
        "telefono",
        "direccion",
        "email",
        "estado"
        )
        ->where('carnet', 'like', '%' . $this->search . '%')
        ->paginate($this->n_registros);
        return view('livewire.lista-usuarios', compact('users'));
    }
}
