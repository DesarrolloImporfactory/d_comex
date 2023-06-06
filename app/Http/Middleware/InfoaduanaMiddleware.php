<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Suscripcion\Suscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoaduanaMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        $usuarioAutenticado = Auth::user();
        $rol = $usuarioAutenticado->roles->first();

        $usuariosConSuscripcionesActivas = DB::table('suscripcions')->where('estado', 'Activa')
            ->where('usuario_id', $usuarioAutenticado->id)
            ->where('sistema_id', 3)->first();

        if (isset($usuariosConSuscripcionesActivas) || $rol->name == 'Admin') {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
