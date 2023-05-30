<?php

namespace App\Http\Livewire\Permisos;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermisosTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $sort = "id", $direction = "asc";
    protected $listeners = ['render' => 'render', 'delete'];
    public $idPermiso, $name, $descripcion, $sistema_id;

    public function render()
    {

        $permisos = Permission::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);
        return view('livewire.permisos.permisos-table', compact(['permisos']));
    }



    public $rules = [
        'name' => 'required|string|min:2|max:20',
        'descripcion' => 'required|string|min:2'
    ];

    public function order($valor)
    {
        if ($this->sort == $valor) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $valor;
            $this->direction = 'asc';
        }
    }

    public function edit(int $idPermiso)
    {
        $data = Permission::findOrFail($idPermiso);
        $this->idPermiso = $data->id;
        $this->name = $data->name;
        $this->descripcion = $data->description;
    }

    public function update()
    {
        $this->validate();
        $data = Permission::find($this->idPermiso);

        $data->update([
            'name' => $this->name,
            'description' => $this->descripcion,
        ]);
        $this->emit('alert', 'Registro actualizado exitosamente!');
        $this->reset(['name']);
    }

    public function delete($idRol)
    {
        Permission::destroy($idRol);
        $this->emit('alert', 'Registro eliminado exitosamente!');
    }
}

