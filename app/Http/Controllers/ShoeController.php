<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Http\Requests\StoreShoeRequest;
use App\Http\Requests\UpdateShoeRequest;

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
        $variables=
        [
            'menu'=>'shoes',
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
        if ($request->file('file')) {
            $post->image_url = $request->file('file')->store('shoes', 'public');
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
        $variables=
        [
            'menu'=>'shoes',
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
        if(  $shoe->update($request->all()))
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
