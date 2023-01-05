<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Charla;

class CharlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charlas = Charla::paginate(5);
        return view('charlas.index')->with('charlas', $charlas);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicess = Service::all();
        return view('charlas.create')->with('servicess', $servicess);
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
            'HoraInicio' => 'required',
            'HoraFin' => 'required',
            'Ubicacion' => 'required',
            'service_id' => 'required',

        ]);
  
        $input = $request->all();
        Charla::create($input);
        return redirect()->route('charlas.index')
                        ->with('success','Charla created successfully.');
    }

         /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tours = Charla::paginate(5);
        return view('Client.Charla.show',compact('tours'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charla  $charla
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicess = Service::all();
        $charla = Charla::find($id);
        return view('charlas.edit',compact('servicess','charla'));
    }

     /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charla  $charla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $charla = Charla::find($id);
        
        $request->validate([
            'HoraInicio' => 'required',
            'HoraFin' => 'required',
            'Ubicacion' => 'required',
            'service_id' => 'required',
        ]);
        $input = $request->all();
  
        $charla->update($input);
    
        return redirect('/charlas');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charla  $charla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charla = Charla::find($id);
        $charla->delete();
        return redirect()->route('charlas.index')
        ->with('success','Charla updated successfully');
    }
 
} 
 