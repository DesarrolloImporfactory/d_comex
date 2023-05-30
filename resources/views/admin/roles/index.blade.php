@extends('adminlte::page')

@section('title', 'Role')

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
                            <h1 class="m-0"><b>GESTIÓN DE ROLES Y PERMISOS</b></h1>
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
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-shield-halved"></i> <b>GESTIÓN DE ROLES</b>
                        </div>
                        <div class="card-body">
                            @livewire('roles.table-roles')
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-shield-halved"></i> <b>GESTIÓN  PERMISOS</b>
                        </div>
                        <div class="card-body">
                            @livewire('permisos.permisos-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

@stop

@section('css')
@stop

@section('js')

@stop
