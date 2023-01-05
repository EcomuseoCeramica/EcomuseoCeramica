<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Reserva;
use App\Models\Taller;
use App\Models\Charla;
use App\Models\Tour;
use App\Models\Formulario;

class ReservaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::paginate(3);;
        $charlas = Charla::paginate(3);;
        $tours = Tour::paginate(3);;

        return view('reservas.index', compact('talleres','charlas','tours'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $servicess = Service::all();
        return view('reservas.create')->with('servicess', $servicess);
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        // 'Nombre' => 'required',
        // 'Identificacion' => 'numeric|required',
        // 'TipoID' => 'numeric|required',
        // 'Apellido1' => 'required',
        // 'Apellido2' => 'required',
        // 'Correo' => 'required|email',
        // 'Telefono' => 'numeric|required|min:1000|max:99999999',
        // 'Alimentacion' => 'required',
        // 'CantidadPer' => 'numeric|required',
        // 'service_id' => 'required',
        // ]);
  
        // $input = $request->all();
  
       
    
        // Reserva::create($input);
     
        // return redirect()->route('reservas.index')
        //                 ->with('success','Service created successfully.');

        $formularios = new Formulario();
        $formularios->TipoID = $request->get('TipoID');
        $formularios->Nombre = $request->get('Nombre');
        $formularios->Apellido1 = $request->get('Apellido1');
        $formularios->Apellido2 = $request->get('Apellido2');
        $formularios->Alimentacion = $request->get('Alimentacion');
        $formularios->Identificacion = $request->get('Identificacion');
        $formularios->Extra = $request->get('Extra');
        $formularios->Correo = $request->get('Correo');
        $formularios->Estado = $request->get('Estado');
        $formularios->CantidadPer = $request->get('CantidadPer');
        $formularios->Telefono = $request->get('Telefono');
        $formularios->service_id = $request->get('service_id');
        $formularios->FechaReserva = $request->get('FechaReserva');
        $formularios->save();
        return redirect('/');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('reservas.show',compact('service'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $service = Service::find($id);
        return view('reservas.edit',compact('service'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeF(Request $request)
    {
        $formularios = new Formulario();
        $formularios->TipoID = $request->get('TipoID');
        $formularios->Nombre = $request->get('Nombre');
        $formularios->Apellido1 = $request->get('Apellido1');
        $formularios->Apellido2 = $request->get('Apellido2');
        $formularios->Alimentacion = $request->get('Alimentacion');
        $formularios->Extra = $request->get('Extra');
        $formularios->Correo = $request->get('Correo');
        $formularios->Estado = $request->get('Estado');
        $formularios->CantidadPer = $request->get('CantidadPer');
        $formularios->Telefono = $request->get('Telefono');
        $formularios->service_id = $request->get('service_id');
        $formularios->save();
        return redirect('/');    
        
       
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $service = Reserva::find($id);
        
        $request->validate([
            'Nombre' => 'required',
        'Identificacion' => 'required',
        'TipoID' => 'required',
        'Apellido1' => 'required',
        'Apellido2' => 'required',
        'Correo' => 'required',
        'Telefono' => 'required',
        'Alimentacion' => 'required',
        'CantidadPer' => 'required',
        'service_id' => 'required',
        ]);
  
        $input = $request->all();
  
        
        $service->create($input);
    
        return redirect('/reserva');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
     
        return redirect()->route('servicess.index')
                        ->with('success','Service updated successfully');
                       
    }


}
