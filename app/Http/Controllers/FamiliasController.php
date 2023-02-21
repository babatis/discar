<?php

namespace App\Http\Controllers;

use App\familias;
use App\linea_familia as code_l_m;
use Illuminate\Http\Request;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archivos.index_f');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function show(familias $familias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function edit(familias $familias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, familias $familias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function destroy(familias $familias)
    {
        //
    }

    public function apiIndex(Request $request){

        if ($request->get('search') === null) {
            
            $familia = code_l_m::orderBy('nombre_l', 'DESC')->paginate(12);

        } else {
            
            $familia = code_l_m::orderBy('nombre_l', 'DESC')
                        ->where('code_f', 'like', '%'.$request->get('search').'%')
                        ->orwhere('nombre', 'like', '%'.$request->get('search').'%')
                        ->orwhere('descripcion', 'like', '%'.$request->get('search').'%')                
                        ->paginate(12);
        }
        
        $paginate = [
            'total' => $familia->total(),
            'current_page' => $familia->currentPage(),
            'per_page' => $familia->perPage(),
            'last_page' => $familia->lastPage(),
            'from' => $familia->firstItem(),
            'to' => $familia->lastPage(),
        ];

        return response()->json(['familias' => $familia, 'paginate' => $paginate] , 200);
    }

    public function apiSearch($search = null)
    {
        if(isset($search)){
            $familias = familias::orderBy('id', 'DESC')
                           ->where('code_f', 'like', '%'.$search.'%')
                           ->orwhere('nombre', 'like', '%'.$search.'%')
                           ->orwhere('descripcion', 'like', '%'.$search.'%')
                           ->get();
        } else {
            $familias = familias::orderBy('id', 'DESC')->get();
        }

        return response()->json( $familias, 200);
    }

    public function getLinea($id = null)
    {
        return response()->json( code_l_m::where('code_l', $id)->get(), 200);
    }
}
