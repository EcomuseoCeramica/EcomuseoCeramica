<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Tour;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::paginate(5);
        return view('tour.index')->with('tours', $tours);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicess = Service::all();
        return view('tour.create')->with('servicess', $servicess);
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
            'Ruta' => 'required',
            'Vestimenta' => 'required',
            'Dificultad' => 'required',
            'Duracion' => 'required',
            'service_id' => 'required',
        ]);
  
        $input = $request->all();
        Tour::create($input);
        return redirect()->route('tour.index')
                        ->with('success','Service created successfully.');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::all();
        $tours = Tour::find($id);
        return view('tour.edit',compact('service','tours'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $tours = Tour::find($id);
        
        $request->validate([
            'Ruta' => 'required',
            'Vestimenta' => 'required',
            'Dificultad' => 'required',
            'Duracion' => 'required',
            'service_id' => 'required',
        ],[
            'Ruta.required' =>'El campo Ruta contiene un error!!',
            'Tematica.required' => 'El campo Tematica contiene un error!!',
            'service_id.required' =>'El campo Servicio contiene un error!!',
            
        ]);
        $input = $request->all();
  
        $tours->update($input);
    
        return redirect('/tour');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tours = Tour::find($id);
        $tours->delete();
        return redirect()->route('tour.index')->with('success','Tour updated successfully');
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tours = Tour::paginate(5);
        return view('Client.Tour.show',compact('tours'));
    }

} 
