<?php

namespace App\Http\Controllers;

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
            $otherAppUrl = 'http://194.163.183.231:8085/home';
            return Redirect::away($otherAppUrl);
        } 
    }
    
    public function create()
    {
        //
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
