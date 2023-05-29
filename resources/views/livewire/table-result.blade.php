<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <select class="form-select" wire:model="perPage">
                    <option value="5"> 5 por página</option>
                    <option value="10">10 por página</option>
                    <option value="15">15 por página</option>
                </select>
            </div>
            <div class="col-md-4 has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input wire:keydown='render' wire:model="searchAll" type="text" class="form-control"
                    placeholder="Buscar en todo...">
            </div>
            <div class="col-md-2">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button wire:ignore.self wire:click="excel('xlsx')" wire:loading.remove type="button"
                        class="btn btn-outline-success"><i class="fa-sharp fa-regular fa-file-excel"></i>
                        Excel</button>

                    <button wire:ignore.self wire:click="excel('csv')" type="button" wire:loading.remove
                        class="btn btn-outline-success "><i class="fa-sharp fa-solid fa-file-csv"></i>
                        CSV</button>
                </div>
                <button wire:loading wire:target='excel' type="button" class="btn btn-outline-warning"><i
                        class="fa-solid fa-spinner fa-spin"></i> Descargando</button>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" wire:model="searchMes" style="width: 100px;">
                            <option value="">TODOS</option>
                            @foreach ($meses as $item)
                                <option value="{{ $item->mes }}">{{ $item->mes }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <a type="button" wire:click="limpiar" class="btn-sm" title="limpiar filtro">
                            <i class="fa-solid fa-rotate-right"></i> limpiar
                        </a>

                    </div>
                    <div class="col-md-5">
                        <div class="float-right">
                            <a type="button" class="btn btn-primary " href="{{ route('back') }}">
                                <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> Regresar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div wire:keydown='render' class="col-md-3 mt-3" wire:loading wire:target="render">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span>Buscando coincidencias....</span>
                </div>
            </div>
            @if (count($data))
                <div class="table-responsive mt-3">
                    @include('table.table')
                </div>
                <div class="row">
                    <div wire:click='render' class="col-md-8 text-center mt-3">
                        {{ $data->links() }}
                    </div>
                </div>
            @else
                <div class="alert alert-light mt-3">{{ $searchAll }} no existen en nuestra base de datos....
                </div>
            @endif

        </div>
    </div>
</div>
<style>
    .example {
        font-size: 12px;
    }
</style>
</div>
