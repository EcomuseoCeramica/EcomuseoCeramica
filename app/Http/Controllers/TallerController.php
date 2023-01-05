<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use App\Models\Service;

class TallerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::paginate(5);
        return view('talleres.index')->with('talleres', $talleres);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $servicess = Service::all();
        return view('talleres.create')->with('servicess', $servicess);
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
            'Categoria' => 'required',
            'Tematica' => 'required',
            'service_id' => 'required',
           
        ],[
            'Categoria.required' =>'El campo Categoria contiene un error!!',
            'Tematica.required' => 'El campo Tematica contiene un error!!',
            'service_id.required' =>'El campo Servicio contiene un error!!',
            
        ]);
  
        $input = $request->all();
        Taller::create($input);
      
        
        return redirect()->route('talleres.index')
        ->with('success','Taller created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicess = Service::all();
        $taller = Taller::find($id);
        return view('talleres.edit',compact('taller','servicess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $taller = Taller::find($id);
        
        $request->validate([
            'Categoria' => 'required',
            'Tematica' => 'required',
            'service_id' => 'required',
        ]);
  
        $input = $request->all();
  
      
        $taller->update($input);
    
        return redirect('/talleres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taller = Taller::find($id);
        $taller->delete();
     
        return redirect()->route('talleres.index')
                        ->with('success','Taller updated successfully');
                       
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tours = Taller::paginate(5);
        return view('Client.Taller.show',compact('tours'));
    }


}
