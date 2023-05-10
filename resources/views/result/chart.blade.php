@extends('adminlte::page')

@section('title', 'Gráficas')

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
                                <h1 class="m-0"><b>GRÁFICOS ESTADISTICOS</b></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Home</li>
                                    <li class="breadcrumb-item "><a href="#">Charts</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">País origen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Arancel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Importador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aduana-tab" data-toggle="tab" href="#aduana" role="tab"
                            aria-controls="contact" aria-selected="false">Aduana, distrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="agente-tab" data-toggle="tab" href="#agente" role="tab"
                            aria-controls="contact" aria-selected="false">Agente aduanero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="embarcador-tab" data-toggle="tab" href="#embarcador" role="tab"
                            aria-controls="contact" aria-selected="false">Embarcador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="regimen-tab" data-toggle="tab" href="#regimen" role="tab"
                            aria-controls="contact" aria-selected="false">Regimen aduanero</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-3">
                            @livewire('result.chart-importador', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-arancel', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-importador', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aduana" role="tabpanel" aria-labelledby="aduana-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-aduana', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="agente" role="tabpanel" aria-labelledby="agente-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-agente', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="embarcador" role="tabpanel" aria-labelledby="embarcador-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-embarcador', ['datos' => $data])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="regimen" role="tabpanel" aria-labelledby="regimen-tab">
                        <div class="row mt-3">
                            @livewire('chart.chart-regimen', ['datos' => $data])
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')

@endsection

@section('js')
@endsection
