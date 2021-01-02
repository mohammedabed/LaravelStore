<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::all();
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
            // 'image'=>'required|image',
            'name'=>'required|string',
            'brand'=>'required|in:Nike,Adidas,New Balance,Asics,Puma,Skechers,Fila,Bata,Burberry,Converse',
            'price'=>'required|integer',
            'gender'=>'required|in:Male,Female,Unisex',
            'category'=>'required|in:Shoes',
        ]);
        $product = Product::create([
            'name'=> $request->name,
            'brand'=> $request->brand,
            'price'=> $request->price,
            'category'=> $request->category,

            ]);
        return response(
            [
                'status'=>'success',
                'product' => $product
            ]
        );
        /*$request->image->store('products','public');
            $product->brand=request('brand');
        $product->price=request('price');
        $product->gender=request('gender');
        $product->category=request('category');
        $product->image=$imagepath;*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return response(
            [
                'status'=>'success',
                'data' => $product
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->validate(request(),[
            // 'image'=>'required|image',
            'name'=>'required|string',
            'brand'=>'required|in:Nike,Adidas,New Balance,Asics,Puma,Skechers,Fila,Bata,Burberry,Converse',
            'price'=>'required|integer',
            'gender'=>'required|in:Male,Female,Unisex',
            'category'=>'required|in:Shoes',
        ]);
        $product = Product::create([
            'name'=> $request->name,
            'brand'=> $request->brand,
            'price'=> $request->price,
            'category'=> $request->category,

        ]);
        return response(
            [
                'status'=>'update success',
                'product' => $product
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {            $product->delete();

        return response(
            [
                'status'=>'delete success',
                'product' => $product
            ]);
    }


}
