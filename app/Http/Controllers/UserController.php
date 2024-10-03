<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:infoaduana.users')->only('index');
    }

    public function index()
    {
        return view('users.index');
    }
    public function redirectSuit(Request $request)
    {
        if (Auth::check()) {
            $sessionId = $request->session()->getId();
            $otherAppUrl = 'https://herramientas.imporsuit.app/';
            return Redirect::away($otherAppUrl);
        }
    }

    public function create()
    {
        $usuario = Auth::user();
        $tipoSuscripcion = Suscripcion::where('estado', 'Activa')->where('usuario_id', $usuario->id)
            ->where('tipo_id', '3')->first();
        $fecha_actual = Carbon::now()->startOfDay();

        if (isset($tipoSuscripcion)) {
            $fecha_fin = Carbon::parse($tipoSuscripcion->fecha_fin)->startOfDay();

            $dias_restantes = $fecha_actual->diffInDays($fecha_fin);
            return response()->json([
                'status' => 200,
                'mensaje' => 'Usuario con suscripción demo.',
                'dias' => $dias_restantes,
                'fecha_fin' => $tipoSuscripcion->fecha_fin,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'mensaje' => 'Usuario normal.'
            ]);
        }
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
