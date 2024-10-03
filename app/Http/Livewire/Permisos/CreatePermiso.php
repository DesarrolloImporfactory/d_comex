<?php

namespace App\Http\Livewire\Permisos;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use App\Models\Sistema;
use Illuminate\Http\Request;

class CreatePermiso extends Component
{
    public $name,$descripcion,$sistema_id;

    public function render()
    {
        return view('livewire.permisos.create-permiso',);
    }


    public $rules = [
        'name' => 'required|string|min:2|max:20|unique:permissions',
        'descripcion' => 'required|string|min:2',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function create(Request $request)
    {
        $this->validate();
        try {
            $permisos = new Permission();
            $permisos->description = $this->descripcion;
            $permisos->name = $this->name;
            $permisos->save();

            $this->emit('alert', 'Registro creado exitosamente!');
            $this->emitTo('permisos.permisos-table', 'render');
        } catch (\Exception $e) {
            $this->emit('alert', $e->getMessage());
        }
        $this->reset(['name','descripcion','sistema_id']);
    }
}
