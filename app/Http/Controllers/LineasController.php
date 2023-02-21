<?php

namespace App\Http\Controllers;

use App\lineas;
use Illuminate\Http\Request;

class LineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archivos.index_l');
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
            'code_l' => 'required|unique:lineas|min:2|max:10',
            'nombre' => 'required|min:2|max:100',
        ]);

        $linea = new lineas;
        $linea->code_l = $req->input('code_l');
        $linea->nombre = $req->input('nombre');
        $linea->descripcion = $req->input('descripcion');
        $linea->save();

        return response()->json('Se a guardo la Nueva Linea', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    // public function show(lineas $lineas)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    // public function edit(lineas $lineas)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $lineas)
    {
        $setMarca = lineas::find($lineas);
        if($setMarca->code_l != $req->input('code_l')){
            $setMarca->code_l = $req->input('code_l');
        }
        if($setMarca->nombre != $req->input('nombre')){
            $setMarca->nombre = $req->input('nombre');
        }
        if($setMarca->descripcion != $req->input('descripcion')){
            $setMarca->descripcion = $req->input('descripcion');
        }
        
        $setMarca->save();

        return response()->json( 
            'Se a actualizo la Linea '. $setMarca->nombre , 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function destroy($lineas)
    {
        lineas::find($lineas)->delete();

        return response()->json('Se elimino la Linea', 200);
    }

    public function apiIndex()
    {
        return response()->json( lineas::orderBy('id', 'DESC')->get(), 200);
    }

    public function apiSearch($search = null)
    {
        if(isset($search)){
            $lineas = marcas::orderBy('id', 'DESC')
                           ->where('code_l', 'like', '%'.$search.'%')
                           ->orwhere('nombre', 'like', '%'.$search.'%')
                           ->orwhere('descripcion', 'like', '%'.$search.'%')
                           ->get();
        } else {
            $lineas = marcas::orderBy('id', 'DESC')->get();
        }

        return response()->json( $lineas, 200);
    }
}
