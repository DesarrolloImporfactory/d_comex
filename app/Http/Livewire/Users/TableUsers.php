<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class TableUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $name, $email, $password, $idUser, $rol;
    protected $listeners = ['render' => 'render', 'delete'];

    protected $rules = [
        'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
        'name' => 'required', 'string', 'max:255',
        'password' => 'required', 'string', 'min:8',
        'rol' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateUser()
    {
        $this->validate();
        $data = User::findOrFail($this->idUser);
        if ($this->password == $data->password) {
            $password = $data->password;
        } else {
            $password = Hash::make($this->password);
        }
        User::where('id', $this->idUser)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
        ]);

        $data->roles()->sync($this->rol);
        $this->emit('alert', 'Registro actualizado exitosamente!');
        // $this->emit('render');
        $this->reset(['name', 'email', 'password']);
    }

    public function delete($idUser)
    {
        User::destroy($idUser);
        $this->emit('alert', 'Registro actualizado exitosamente!');
    }

    public function editUser(int $idUser)
    {
        $data = User::findOrFail($idUser);
        $usuario = User::with('roles')->findOrFail($idUser);

        if (count($usuario->roles) > 0) {
            foreach ($usuario->roles as $user) {
                $role = $user->id;
            }
        } else {
            $role = "";
        }

        if (isset($data)) {
            $this->idUser = $data->id;
            $this->name = $data->name;
            $this->email = $data->email;
            $this->password = $data->password;
            $this->rol = $role;
        } else {
            return redirect()->to('admin/users');
        }
    }

    public function render()
    {
        $roles = Role::get();
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->paginate(3);
        return view('livewire.users.table-users', compact('usuarios', 'roles'));
    }
}
