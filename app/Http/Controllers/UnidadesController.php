<?php

namespace App\Http\Controllers;

use App\unidades;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archivos.index_u');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        Request()->validate([
            'code_u' => 'required|unique:unidades|min:2|max:10',
            'nombre' => 'required|min:2|max:100',
        ]);

        $unidad = new unidades;
        $unidad->code_u = $req->input('code_u');
        $unidad->nombre = $req->input('nombre');
        $unidad->descripcion = $req->input('descripcion');
        $unidad->save();

        return response()->json('Se a guardo la nueva unidad ' . $unidad->nombre , 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    // public function show(unidades $unidades)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    // public function edit(unidades $unidades)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $unidades)
    {   
        $setUnidad = unidades::find($unidades);
        if($setUnidad->code_u != $req->input('code_u')){
            $setUnidad->code_u = $req->input('code_u');
        }
        if($setUnidad->nombre != $req->input('nombre')){
            $setUnidad->nombre = $req->input('nombre');
        }
        if($setUnidad->descripcion != $req->input('descripcion')){
            $setUnidad->descripcion = $req->input('descripcion');
        }
        
        $setUnidad->save();

        return response()->json( 
            'Se actualizo la Unidad' , 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($unidades)
    {
        unidades::find($unidades)->delete();

        return response()->json('Se elimino la Unidad', 200);
    }

    public function apiIndex(){
        return response()->json( unidades::orderBy('id', 'DESC')->get(), 200);
    }

    public function apiSearch($search = null)
    {
        if(isset($search)){
            $marcas = unidades::orderBy('id', 'DESC')
                           ->where('code_u', 'like', '%'.$search.'%')
                           ->orwhere('nombre', 'like', '%'.$search.'%')
                           ->orwhere('descripcion', 'like', '%'.$search.'%')
                           ->get();
        } else {
            $marcas = unidades::orderBy('id', 'DESC')->get();
        }

        return response()->json( $marcas, 200);
    }
}
