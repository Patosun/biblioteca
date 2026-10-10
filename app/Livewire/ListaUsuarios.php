<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ListaUsuarios extends Component
{
    public $search = '';

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
        "estado"
        )
        ->where('carnet', 'like', '%' . $this->search . '%')
        ->get();
        return view('livewire.lista-usuarios', compact('users'));
    }
}
