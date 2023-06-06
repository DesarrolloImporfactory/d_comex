<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

    public function redirectUser(string $id)
    {
        $sessionData = DB::table('sessions')->where('id', $id)->first();

        Auth::loginUsingId($sessionData->user_id);
        return redirect('home');
    }

    public function logout(Request $request)
    {
        $otherAppUrl = 'http://194.163.183.231:8085/';
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : Redirect::away($otherAppUrl);
    }
    
}
