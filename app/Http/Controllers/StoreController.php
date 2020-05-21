<?php

namespace App\Http\Controllers;

use App\Store;
use App\Images;
use Redirect;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Store::all();
        return view('store.index', [
            'locales' => $locales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
   
        $model = new Store;
        
        $model->name = $request->name;
        $model->adress = $request->adress;
        $model->phone = $request->phone;
        $model->email = $request->email;

        $model->save();

        $files = $request->file('imagenes');

        if($request->hasfile('imagenes'))
        {
            foreach($request->file('imagenes') as $file)
            {
                $modelI  = new Images;
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $modelI->store_id = $model->id;
                $modelI->route = $name;
                $modelI->save();  
            }
        }

        if ($model->save()) {
            return Redirect::to('index')->with('success','LA TIENDA HA SIDO CREADA DE MANERA EXITOSA.');
        } else {
            return Redirect::to('index')->with('danger','ERROR ! LA TIENDA NO PUDO SER CREADA. INTENTE NUEVAMENTE');   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
