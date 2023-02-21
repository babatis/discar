<?php

namespace App\Http\Controllers;

use App\prodVenta;
use App\precio_ventas;
use App\prodAll;
use Illuminate\Http\Request;

class PrecioVentasController extends Controller
{
    
    public function __construct(prodVenta $prodV){
        $this->prodV = $prodV;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('precio.index');
    }

    public function apiPrecioAll(Request $request)
    {
        
        if($request->get('search') === null){
            
            $prod = prodAll::select('codinterno', 'barcode', 'slug', 'nombre', 'pcosto', 'desct1', 'costotot', 'p1_venta', 'p2_venta', 'p3_venta', 'activo')
                           ->orderBy('nombre', 'asc')->paginate(15);

        } else {
        
            $prod = prodAll::select('codinterno', 'barcode', 'slug', 'nombre', 'pcosto', 'desct1', 'costotot', 'p1_venta', 'p2_venta', 'p3_venta', 'activo')
                            ->where('codinterno', 'like', '%'. $request->get('search') . '%')
                            ->orwhere('barcode', 'like' , '%'. $request->get('search') .'%')
                            ->orWhere('nombre', 'like', '%'. $request->get('search')  . '%')
                            ->orderBy('nombre', 'asc')
                            ->paginate(15);
        }

        $paginate = [
            'total' => $prod->total(),
            'current_page' => $prod->currentPage(),
            'per_page' => $prod->perPage(),
            'last_page' => $prod->lastPage(),
            'from' => $prod->firstItem(),
            'to' => $prod->lastPage(),
        ];

        // return response()->json( ProdV::orderBy('nombre', 'asc')->get(), 200);

        return response()->json(['prod' => $prod, 'paginate' => $paginate], 200);
    }

    public function search(Request $req){

        $search = $req->input('search');
        
        if (isset($search)) {

            $prods = $this->prodV->select()
                                 ->where('codinterno', 'like', '%'. $search . '%')
                                 ->orWhere('nombre', 'like', '%'. $search . '%')   
                                 ->paginate(23);

        } else {
            $prods = $this->prodV->select()
                                ->paginate(23);
        }
        
        return view('precio.index', compact('prods'));
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
     * @param  \App\precio_ventas  $precio_ventas
     * @return \Illuminate\Http\Response
     */
    public function show(precio_ventas $precio_ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\precio_ventas  $precio_ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(precio_ventas $precio_ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\precio_ventas  $precio_ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, precio_ventas $precio_ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\precio_ventas  $precio_ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(precio_ventas $precio_ventas)
    {
        //
    }
}
