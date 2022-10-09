<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Http\Requests\StoreShoeRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateShoeRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Modelsho;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoe::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'shoes',
            'shoes'=>$shoes
        ];
        return view('shoes.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_active=Category::all()->where('status','=','2');
        $brands_active=Brand::all()->where('status','=','2');
        $models_active=Modelsho::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'shoes',
            'categories'=>$categories_active,
            'brands'=>$brands_active,
            'models'=>$models_active,
        ];
        return view('shoes.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoeRequest $request)
    {


        $post = Shoe::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //imagen
        if ($request->file('image_url')) {
            $post->image_url = $request->file('image_url')->store('shoes', 'public');
            $post->save();
        }



        if($post->save())
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
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Shoe $shoe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
        $categories_active=Category::all()->where('status','=','2');
        $brands_active=Brand::all()->where('status','=','2');
        $models_active=Modelsho::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'shoes',
            'categories'=>$categories_active,
            'brands'=>$brands_active,
            'models'=>$models_active,
            'shoe'=>$shoe
        ];
        return view('shoes.edit')->with($variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoeRequest  $request
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoeRequest $request, Shoe $shoe)
    {
        $shoe->update(['user_id' => auth()->user()->id] +$request->all());
          //imagen
          if ($request->file('image_url')) {
            $shoe->image_url = $request->file('image_url')->store('shoes', 'public');
        }

        if($shoe->save())
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
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoe $shoe)
    {
        $shoe->status=-2;
        if($shoe->update())
        {
         return back()->with('success','Se ha actualizado correctamente');
         }
         else
         {
             return back()->withErrors('No se ha actualizado correctamente');

         }
    }

}
