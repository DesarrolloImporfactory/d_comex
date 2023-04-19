<div>
    @include('users.edit')
    <div class="container-fluid">
        <div class="row has-search mt-3">
            <input type="hidden" class="form-control" id="producto" name="producto">
            <div class="col-md-1"><label for="">BUSCAR:</label></div>
            <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input wire:model="search"
                    type="text" class="form-control" placeholder="Buscar usuario.">
            </div>
            <div class="col-md-3">
                @livewire('users.create-user')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>VERIFY</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($usuarios->count())
                                @foreach ($usuarios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->email_verified_at }}</td>
                                        <td><button class="btn btn-success btn-sm mr-2" wire:click="editUser({{ $item->id }})" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit"><i
                                                    class="fa-solid fa-pen-to-square "></i></button>
                                            <button class="btn btn-danger btn-sm ml-2" wire:click="$emit('deleteUser',{{ $item->id }})"
                                                type="button"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <div class="alert alert-danger">No existe coincidencias...</div>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div>
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        Livewire.on('deleteUser', userId => {
            iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Hey',
                message: 'Estas seguro de eliminar?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                    ['<button>Ok</button>', function(instance, toast) {
                        Livewire.emitTo('users.table-users', 'delete', userId);
                    }, true], // true to focus
                    ['<button>Close</button>', function(instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                console.info('closedBy: ' +
                                    closedBy
                                    ); // The return will be: 'closedBy: buttonName'
                            }
                        }, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' +
                        closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });
        });
    </script>
@endpush
