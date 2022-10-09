<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'brands',
            'brands_available'=>$brands
        ];


      return view('brands.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variables=
        [
            'menu'=>'brands',
            'brands_available'
        ];


      return view('brands.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $request_input = Brand::create($request->all());



        if($request_input->save())
        {
            return back()->with('success','Se ha creado correctamente');
        }
        else
        {
            return back()->withErrors('No se ha creado correctamente');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {

        $variables=
        [
            'menu'=>'brands',
            'brands_available'
        ];

      return view('brands.show')->with($variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $variables=
        [
            'menu'=>'brands',
            'brand'=>$brand
        ];
        return view('brands.edit')->with($variables);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {


        if(  $brand->update($request->all()))
        {
            return back()->with('success','Se ha actualizado correctamente');
        }
        else
        {
            return back()->withErrors('No se ha actualizado correctamente');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
       $brand->status=-2;
       if($brand->update())
       {
        return back()->with('success','Se ha actualizado correctamente');
    }
    else
    {
        return back()->withErrors('No se ha actualizado correctamente');

    }

    }
}
