<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;


class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar= $request->get('buscar');
        $galerias = Galeria::where('Descripcion','like','%'.$buscar.'%')->paginate(4);
    
        return view('galerias.index' ,compact('galerias','buscar'))->with('galerias', $galerias);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $galerias = Galeria::all();
        return view('galerias.create',compact('galerias'));
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
            
            'Descripcion' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'Descripcion.required' => 'El campo Descripción contiene un error!!',
            'image.required' => 'El campo imagen contiene un error!!',
        ]
    );

       
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Galeria::create($input);
     
        return redirect()->route('galerias.index')
                        ->with('success','Galeria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tours = Galeria::paginate(8);
        return view('Client.Galeria.show',compact('tours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        $galerias = Galeria::all();
        
        return view('galerias.edit',compact('galeria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        $request->validate([
      
            'Descripcion' => 'required',
            
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
          
        $galeria->update($input);
    
        return redirect()->route('galerias.index')
                        ->with('success','Galeria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = Galeria::find($id);
        $galeria->delete();
        return redirect('/galerias');
                       
    }
}