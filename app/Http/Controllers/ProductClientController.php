<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Service;
use App\Models\Informacion;

class ProductClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $products = Product::all();
         $Url = Informacion::all();
         $products = Product::inRandomOrder()->take(3)->get();
         $services = Service::inRandomOrder()->take(3)->get();
        return view('layouts.welcomePlan', compact ('products','services','Url'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::all();
        return view('Client.products.ProductIndex', compact ('products'))->with('products', $products);
    }

 
    
    
}