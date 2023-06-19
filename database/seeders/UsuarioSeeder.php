<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name'  => 'Ricardo',
                'email' => 'ricardo.c.moreti@gmail.com',
                'password'  => Hash::make('1234'),
            ]
            );
    }
}

