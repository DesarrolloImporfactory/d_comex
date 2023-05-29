<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Session as sesion;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        $id = auth()->user()->id;
        $newDate = Carbon::now();
        User::where('id', $id)->update(['session' => $newDate]);
    }

    public function redirectUser(string $id){
        $sessionData = sesion::where('id', $id)->first();

        Auth::loginUsingId($sessionData->user_id);
        return redirect('home');
    }
}
