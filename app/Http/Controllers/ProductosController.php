<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Service;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $products = Product::all();
        
         $products = Product::paginate(8);
         $services = Service::inRandomOrder()->take(3)->get();
        return view('Client.products.ProductIndex', compact ('products','services'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

 
    
    
}