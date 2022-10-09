<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Shoe;

use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Modelsho;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $categories = Category::all()->where('status','=','2');
         $models = Modelsho::all()->where('status','=','2');
         $brands = Brand::all()->where('status','=','2');


        $products_available= Shoe::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'categories',
            'shoes'=>$products_available,
            'brands'=>$brands,
            'categories'=>$models,
            'models'=>$categories,
        ];
        return view('catalog.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatalogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatalogRequest  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        //
    }

    public function index_category_products($category_id)
    {
        $products_available=Shoe::all()->where('status','=','2')->where('category_id','=',$category_id);

        $variables=
        [
            'menu'=>'categories',
            'shoes'=>$products_available,

        ];
        return view('catalog.index_category_shoe')->with($variables);
    }
}
