<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::create([
            'name'=>'Ariel Taipe',
            'email'=>'ariel.12isaias@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
    }
}
