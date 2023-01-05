<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $informacione = Informacion::all();
        return view('informacion.index')->with('informacione', $informacione);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        return view('informacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Titulo' => 'required',
            'Descripcion' => 'required',
            'Video' => 'required',
        ],[
            'Titulo.required' => 'El campo Titulo contiene un error!!',
            'Descripcion.required' => 'El campo Descripcion contiene un error!!',
            'Video.required' => 'El campo Video contiene un error!!',
            
        ]
    );

       
  
        $input = $request->all();
  
       
        Informacion::create($input);
     
        return redirect()->route('informacion.index')->with('success','Informacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function show(Informacion $informacion)
    {
        return view('informacion.show',compact('informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informacions = Informacion::find($id);
        
        return view('informacion.edit',compact('informacions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informacion $informacion)
    {
        $request->validate([
            'Titulo' => 'required',
            'Descripcion' => 'required',
            'Video' => 'required',
        ]);
  
        $input = $request->all();

        $informacion->update($input);
    
        return redirect()->route('informacion.index')
                        ->with('success','Informacion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informacion = Informacion::find($id);
        $informacion->delete();
        return redirect('/informacion');
                       
    }
}

