<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'categories',
            'categories_available'=>$categories
        ];
        return view('categories.index')->with($variables);

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
            'menu'=>'categories',
        ];
        return view('categories.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $request_input = Category::create($request->all());



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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $variables=
        [
            'menu'=>'categories',
            'category'=>$category
        ];
        return view('categories.edit')->with($variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        if(  $category->update($request->all()))
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->status=-2;
       if($category->update())
       {
        return back()->with('success','Se ha actualizado correctamente');
        }
        else
        {
            return back()->withErrors('No se ha actualizado correctamente');

        }
    }
}
