<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $request->validate([
            'periodo' => ['required'],
            'operacion' => ['required'],
        ]);

        $data = $request->except('_token');

        return view('result.chart', compact('data'));
        
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
