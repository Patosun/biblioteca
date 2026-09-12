<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class Primerusuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'code' => Str::uuid(),
            'name' => 'pepe',
            'email' => 'pepe@morales.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
