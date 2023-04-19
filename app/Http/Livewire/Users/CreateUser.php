<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $email, $name, $password,$rol;

    protected $rules = [
        'email' => 'required|string|email|max:255|unique:users',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'rol' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function createUser()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];

        if (User::create($data)->assignRole($this->rol)) {
            $this->emit('alert', 'Registro creado exitosamente!');
            $this->emitTo('users.table-users', 'render');
        } else {
            $this->emit('alert', 'Error al registrar usuario!');
        }
        $this->reset(['name', 'email', 'password','rol']);
    }

    public function render()
    {
        $roles = Role::get();
        return view('livewire.users.create-user', compact('roles'));
    }
}
