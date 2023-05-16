<div class="preloader flex-column justify-content-center align-items-center">

    {{-- Preloader logo --}}
    <img src="{{ asset(config('adminlte.preloader.img.path', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
        class="{{ config('adminlte.preloader.img.effect', 'animation__shake') }}"
        alt="{{ config('adminlte.preloader.img.alt', 'AdminLTE Preloader Image') }}"
        width="{{ config('adminlte.preloader.img.width', 60) }}"
        height="{{ config('adminlte.preloader.img.height', 60) }}">
    {{-- <span>Cargando resultado.....</span> --}}

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <span>Buscando coincidencias....</span>
        </div>
    </div>

</div>
