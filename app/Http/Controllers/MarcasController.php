<?php

namespace App\Http\Controllers;

use App\marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archivos.index_m');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        Request()->validate([
            'code_m' => 'required|unique:marcas|min:2|max:10',
            'nombre' => 'required|min:2|max:100',
        ]);

        $marca = new marcas;
        $marca->code_m = $req->input('code_m');
        $marca->nombre = $req->input('nombre');
        $marca->descripcion = $req->input('descripcion');
        $marca->save();

        return response()->json('Se guardo la Nueva Marca', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function show(marcas $marcas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function edit(marcas $marcas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $marcas)
    {

        $setMarca = marcas::find($marcas);
        if($setMarca->code_m != $req->input('code_m')){
            $setMarca->code_m = $req->input('code_m');
        }
        if($setMarca->nombre != $req->input('nombre')){
            $setMarca->nombre = $req->input('nombre');
        }
        if($setMarca->descripcion != $req->input('descripcion')){
            $setMarca->descripcion = $req->input('descripcion');
        }
        
        $setMarca->save();

        return response()->json( 
            'Se a actualizo la Marca '. $setMarca->nombre , 200
        );
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy($marcas)
    {
        marcas::find($marcas)->delete();

        return response()->json('Se elimino la Marca', 200);

    }

    public function apiIndex()
    {
        return response()->json( marcas::orderBy('id', 'DESC')->get(), 200);
    }

    public function apiSearch($search = null)
    {
        if(isset($search)){
            $marcas = marcas::orderBy('id', 'DESC')
                           ->where('code_m', 'like', '%'.$search.'%')
                           ->orwhere('nombre', 'like', '%'.$search.'%')
                           ->orwhere('descripcion', 'like', '%'.$search.'%')
                           ->get();
        } else {
            $marcas = marcas::orderBy('id', 'DESC')->get();
        }

        return response()->json( $marcas, 200);
    }
}
