<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;

class FormularioController extends Controller
{


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formularioss = Formulario::all();
        $buscar= $request->get('buscar');
        $formularioss = Formulario::where('Nombre','like','%'.$buscar.'%')->orwhere('Apellido1','like','%'.$buscar.'%')->paginate(4);
        
        return view('formularios.index', compact('formularioss','buscar'));
    }



    public function store(Request $request)
    {
     
        
       
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulario  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formularioss = Formulario::find($id);
        $formularioss->delete();
     
        return redirect('/formularios')->with('success','Product deleted successfully');
                       
    }
}
