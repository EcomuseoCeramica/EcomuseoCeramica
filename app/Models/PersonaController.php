<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use RealRashid\SweetAlert\Facades\Alert;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function index(Request $request)
    {
        
        $buscar= $request->get('buscar');
        $personas = Persona::where('Nombre','like','%'.$buscar.'%')->orwhere('Apellido1','like','%'.$buscar.'%')->paginate(4);
        
        return view('persona.index', compact('personas', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

    //      $request->validate([
    //         'Nombre' => 'required',
    //         'Apellido1' => 'required|numeric|min:10|max:999999',
    //         'Apellido2' => 'required',
    //         'Correo' => 'required',
    //         'Telefono' => 'required',
    //         'Tipo_Persona' => 'required',
           
    //     ],[
    //         'Nombre.required' =>'El campo Nombre contiene un error!!',
    //         'Apellido1.required' => 'El campo Apellido1 contiene un error!!',
    //         'Apellido2.required' =>'El campo Apellido2 contiene un error!!',
    //         'Correo.required' =>'El campo de Correo contiene un error!!',
    //         'Telefono.required' =>'El campo Telefono contiene un error!!',
    //     ]
    // );
        

       
  
    //     $input = $request->all();
  
        
    //     Persona::create($input);
     
    //     return redirect()->route('personas.index')
    //                     ->with('success','Product created successfully.');

                        
         $personas = new Persona();
         $personas->Nombre = $request->get('Nombre');
         $personas->Apellido1 = $request->get('Apellido1');
         $personas->Apellido2 = $request->get('Apellido2');
         $personas->Correo = $request->get('Correo');
         $personas->Telefono = $request->get('Telefono');
         $personas->Tipo_Persona = $request->get('Tipo_Persona');
         $personas->Tipo_Artesania = $request->get('Tipo_Artesania');
        //  $personas->Nombre = $request->validate(['Nombre' => 'required'],['Nombre.required' =>'El campo Nombre contiene un error!!']);
         $personas->save();
         return redirect('/personas')->with('success', 'Se ha creado exitosamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $personas)
    {
        return view('persona.show',compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('persona.edit')->with('persona',$persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        $persona->Nombre = $request->get('Nombre');
        $persona->Apellido1 = $request->get('Apellido1');
        $persona->Apellido2 = $request->get('Apellido2');
        $persona->Correo = $request->get('Correo');
        $persona->Telefono = $request->get('Telefono');
        $persona->Tipo_Persona = $request->get('Tipo_Persona');
        $persona->save();

        return redirect('/personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);   
             
        $persona->delete();

        return redirect('/personas');
    }
}
