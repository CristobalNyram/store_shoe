<?php

namespace App\Http\Controllers;

use App\Models\Modelsho;
use App\Http\Requests\StoreModelshoRequest;
use App\Http\Requests\UpdateModelshoRequest;

class ModelshoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Modelsho::all()->where('status','=','2');

        $variables=
        [
            'menu'=>'categories',
            'models'=>$models
        ];
        return view('models.index')->with($variables);
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
            'menu'=>'models',
        ];
        return view('models.create')->with($variables);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModelshoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelshoRequest $request)
    {
        $request_input = Modelsho::create($request->all());



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
     * @param  \App\Models\Modelsho  $modelsho
     * @return \Illuminate\Http\Response
     */
    public function show(Modelsho $modelsho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelsho  $modelsho
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelsho $modelsho)
    {
        $variables=
        [
            'menu'=>'models',
            'models'=>$modelsho
        ];
        return        view('models.edit')->with($variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModelshoRequest  $request
     * @param  \App\Models\Modelsho  $modelsho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelshoRequest $request, Modelsho $modelsho)
    {

        if(  $modelsho->update($request->all()))
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
     * @param  \App\Models\Modelsho  $modelsho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelsho $modelsho)
    {
        $modelsho->status=-2;
        if($modelsho->update())
        {
         return back()->with('success','Se ha actualizado correctamente');
         }
         else
         {
             return back()->withErrors('No se ha actualizado correctamente');

         }
    }
}
