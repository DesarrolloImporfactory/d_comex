@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop

@section('content')
    
    <div class="row">
        <div class="card border-light mt-3">
            <div class="card-header">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1 class="m-0"><b>GESTION DE USUARIOS</b></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Home</li>
                                    <li class="breadcrumb-item "><a href="#">Usuarios</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header">
                @livewire('users.table-users')
            </div>
        </div>
    </div>

@stop
@section('script')
@endsection

@section('css')
@endsection
