<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Persona;

class ServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar= $request->get('buscar');
        $servicess =Service::where('Nombre','like','%'.$buscar.'%')->paginate(4);
        return view('servicess.index',compact('servicess','buscar'))->with('servicess', $servicess);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $personas = Persona::all();
        return view('servicess.create')->with('personas', $personas);
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
            'Nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'Precio' => 'required|numeric|min:10|max:999999',
            'Fecha' => 'required | after_or_equal: today',
            'CantidadMin' => 'required|numeric',
            'Descripcion' => 'required',
            'persona_id' => 'required|numeric',
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'Nombre.required' =>'El campo Nombre contiene un error!!',
            'Precio.required' => 'El campo Precio contiene un error!!',
            'Fecha.required' =>'El campo Fecha contiene un error!!',
            'CantidadMin.required' =>'El campo de Cantidad Minima contiene un error!!',
            'Descripcion.required' =>'El campo imagen Descricpión contiene un error!!',
            'persona_id.required' =>'El campo Encargado contiene un error!!',
            'image.required' =>'El campo imagen contiene un error!!',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Service::create($input);
     
        return redirect()->route('servicess.index')
                        ->with('success','Service created successfully.');
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas = Persona::all();
        $service = Service::find($id);
        return view('servicess.edit',compact('service','personas'));
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
        $service = Service::find($id);
        
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            'Fecha' => 'required',
            'CantidadMin' => 'required',
            'Descripcion' => 'required',
            'persona_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'Nombre.required' =>'El campo Nombre contiene un error!!',
            'precio.required' => 'El campo Precio contiene un error!!',
            'Fecha.required' =>'El campo Descripción contiene un error!!',
            'CantidadMin.required' =>'El campo de Autor contiene un error!!',
            'Descripcion.required' =>'El campo imagen contiene un error!!',
            'persona_id.required' =>'El campo imagen contiene un error!!',
            'image.required' =>'El campo imagen contiene un error!!',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $service->update($input);
    
        return redirect('/servicess');
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
