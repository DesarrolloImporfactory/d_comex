<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right btn-sm" data-bs-toggle="modal"
        data-bs-target="#createPermiso">
        Crear Permiso
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createPermiso" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shield-halved"></i> Crear nuevo
                        Permiso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='create' action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Nombre del permiso:</p>
                            <input wire:model='name' class="form-control" type="text">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Descripcion del permiso:</p>
                            <input wire:model='descripcion' class="form-control" type="text">
                            @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
