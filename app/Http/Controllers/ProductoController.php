<?php

namespace App\Http\Controllers;

use App\prodAll;
use App\productos as Prod;
use App\precio_ventas as ProdPv;
use App\prodCompra as ProdC;
use App\prodVenta as ProdV;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class ProductoController extends Controller
{
    
    function __construct(Prod $Prod, ProdAll $ProdAll, ProdPV $ProdPV)
    {
        $this->Prod = $Prod;
        $this->ProdAll = $ProdAll;
        $this->ProdPV = $ProdPV;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
                
        return view('prod.index_A');
    }

    public function search(Request $req) {
        return 'Hola search '. $req;
    }

    // public function price(){
    //     dd(ProdV);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prod.create', ['status' => false]);
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
            'codinterno'=> 'required|unique:productos|min:5|max:255',
            'barcode'  => 'required|min:5|max:255',
            'nombre' => 'required|min:5|max:255',
            'unidad' => 'required',
            'linea' => 'required',
            'marca' => 'required',
            //'rutProv' => 'required',
            // 'idprov' => 'required',
            'pCosto' => 'required',
            'cantidad' => 'required',
            // 'costotot' => 'required|min:2'
        ]);

        // dd($req->all());

        if ($req->has('activo')){
            $activo = 1;
        } else {
            $activo = 0;
        }

        if($req->hasFile('file')){
            $file = $req->file('file');
            $extension = $req->file->extension();
            $nombre = time().'.'.$extension;
            $path = public_path() . '/uploads/';
            $file->move($path, $nombre);

        } else {
            $nombre = null;
        }

        $this->Prod->create(array(
            'slug' => Str::slug($req->input('codinterno'), '-').'-'. Str::random(5),
            'codinterno' => $req->input('codinterno'),
            'barcode' => $req->input('barcode'),
            'nombre' => $req->input('nombre'),
            'descripcion' => $req->input('descripcion'),
            'linea' => $req->input('linea'),
            'familia' => $req->input('familia'),
            'marca' => $req->input('marca'),
            'unidad' => $req->input('unidad'),
            'cantidad' => $req->input('cantidad'),
            'imagen' => $nombre,
            'activo' => $activo
        ));

        $codinter = $req->input('codinterno');

        // $Prod_id = $this->Prod->select('id')
        //                       ->where('codinterno', '=',  $codinter)
        //                       ->get();
        $Prod_id = Prod::where('codinterno', $codinter)->first();

        // dd( $Prod_id->id);

        if ($activo == 1){

            $this->ProdPV->create(array(
                'prod_id' => $Prod_id->id,
                'prov_id' => $req->input('idprov'),
                'nfactura' => $req->input('numFactura'),
                'detalle' => 'Precio Inicial',
                'pcosto' => $req->input('pCosto'),
                'cantidad' => $req->input('cantidad'),
                'desct1' => $req->input('desc1'),
                'desct2' => $req->input('desc2'),
                'flete' => $req->input('flete'),   
                'costotot' => $req->input('pFinal'),
                'p1_neto' => $req->input('p1Neto'),
                'p1_iva' => $req->input('p1PrecioV') - $req->input('p1Neto'),
                'p1_venta' => $req->input('p1PrecioV'),
                'p2_neto' => $req->input('p2Neto'),
                'p2_iva' => $req->input('p2PrecioV') - $req->input('p2Neto'),
                'p2_venta' => $req->input('p2PrecioV'),
                'p3_neto' => $req->input('p3Neto'),
                'p3_iva' => $req->input('p3PrecioV') - $req->input('p3Neto'),
                'p3_venta' => $req->input('p3PrecioV'),
                'activo' => 1
            ));

        } else {
            
            $this->ProdPV->create(array(

                'prod_id' => $Prod_id->id,
                'prov_id' => $req->input('idprov'),
                'nfactura' => $req->input('numFactura'),
                'detalle' => 'Precio Inicial',
                'pcosto' => $req->input('pCosto'),
                'cantidad' => $req->input('cantidad'),
                'desct1' => $req->input('desc1'),
                'desct2' => $req->input('desc2'),
                'flete' => $req->input('flete'),
                'costotot' => $req->input('pFinal'),
                'activo' => 1

            ));
        }
        
        return view('prod.create', ['status' => 'El Producto se a Guardado']);
        // return redirect()->back();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Prod $producto)
    {
       
        $prodV = ProdPv::where([
                                ['prod_id', '=', $producto->id],
                                ['activo', '=', 1]
                               ])->firstOrFail();
        
        if (isset($prodV)){
            // return '<pre>' . $ProdV . '</pre>'; 
            return view('prod.show', compact('producto', 'prodV'));
        } else {
            // return 'no hay Prodv';
            return view('prod.show', compact('producto'));
        }

        // return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $req, Prod $producto)
    {
        $producto->barcode = $req->input('barcode');
        $producto->nombre = $req->input('nombre');
        $producto->descripcion = $req->input('descripcion');
        $producto->linea = $req->input('linea');
        $producto->familia = $req->input('familia');
        $producto->marca = $req->input('marca');
        $producto->unidad = $req->input('unidad');
        $producto->save();
        
        $prodV = ProdPv::where([
                    ['prod_id', '=', $producto->id],
                    ['activo', '=', 1]
                ])->firstOrFail();
        
        $prodV->p1_neto = $req->input('p1_neto');
        $prodV->p1_iva = $req->input('p1_venta') - $req->input('p1_neto');
        $prodV->p1_venta = $req->input('p1_venta');
        $prodV->p2_neto = $req->input('p2_neto');
        $prodV->p2_iva = $req->input('p2_venta') - $req->input('p2_neto');
        $prodV->p2_venta = $req->input('p2_venta');
        $prodV->p3_neto = $req->input('p3_neto');
        $prodV->p3_iva = $req->input('p3_venta') - $req->input('p3_neto');
        $prodV->p3_venta = $req->input('p3_venta');
        $prodV->save();

        return response()->json( 
            'Se a actualizo el producto '. $producto->codinterno , 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }

    public function apiIndex(){
        return response()->json( prodAll::get(), 200);
    }

    public function apiIndexPag(){

        return response()->json( prodAll::where('activo', 1)->orderBy('nombre', 'asc')->get(), 200);
    }

    public function apiPrecioVenta(Request $request) {

        if($request->get('search') === null){
            
            $prod = prodAll::select('codinterno', 'barcode', 'slug', 'nombre', 'cantidad', 'unidad', 'marca', 'linea', 'familia', 'imagen', 'p3_neto', 'p3_iva', 'p3_venta', 'activo')
                           ->orderBy('nombre', 'asc')->paginate(12);

        } else {
        
            $prod = prodAll::select('codinterno', 'barcode', 'slug', 'nombre', 'cantidad', 'unidad', 'marca', 'linea', 'familia', 'imagen', 'p3_neto', 'p3_iva', 'p3_venta', 'activo')
                            ->where('codinterno', 'like', '%'. $request->get('search') . '%')
                            ->orwhere('barcode', 'like' , '%'. $request->get('search') .'%')
                            ->orWhere('nombre', 'like', '%'. $request->get('search')  . '%')
                            ->orderBy('nombre', 'asc')
                            ->paginate(12);
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

    public function apiSearchPag(Request $request, $search = null){

        if(isset($search)){
            $prod = ProdV::where('codinterno', 'like', '%'. $search . '%')
                            ->orwhere('barcode', 'like' , '%'.$search.'%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->orderBy('nombre', 'asc')
                            ->paginate(12);
        } else {
            $prod = ProdV::where('activo', 1)->orderBy('nombre', 'asc')->paginate(12);
        }

        $paginate = [
            'total' => $prod->total(),
            'current_page' => $prod->currentPage(),
            'per_page' => $prod->perPage(),
            'last_page' => $prod->lastPage(),
            'from' => $prod->firstItem(),
            'to' => $prod->lastPage(),
        ];
        
        return response()->json(['prod' => $prod, 'paginate' => $paginate], 200);
        
    }

    public function apiSearch(Request $request){

        $search = (string) $request->get('search');

        if(isset($search)){
            $prods = prodAll::where('codinterno', 'like', '%'. $search . '%')
                            ->orwhere('barcode', 'like' , '%'. $search.'%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->orWhere('slug', 'like', '%'. $search . '%')
                            ->orderBy('prod_id', 'desc')
                            ->get();
        } else {
            $prods = prodAll::get();
        }
        
        return response()->json( $prods, 200);
        
    }
    
    public function apiSearchPrecio($search = null){
        
        if(isset($search)){
            $prods = ProdV::where('codinterno', 'like', '%'. $search . '%')
                            // ->orwhere('barcode', 'like' , '%'.$search.'%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->orWhere('slug', 'like', '%'. $search . '%')
                            ->get();
        } else {
            $prods = ProdV::get();
        }

        return response()->json($prods, 200);
    }

    public function apiSearchPCompra($search = null){
        
        if(isset($search)){
            $prods = ProdC::where('codinterno', 'like', '%'. $search . '%')
                            ->orwhere('barcode', 'like' , '%'.$search.'%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->orWhere('slug', 'like', '%'. $search . '%')
                            ->get();
        } else {
            $prods = ProdC::get();
        }

        return response()->json($prods, 200);
    }

    public function getApiSearchCode($search = null){
       
        $prod = ProdC::where('codinterno', $search)->first();

        if ($prod === null) {
            return response()->json(null, 400);
        } else {
            return response()->json($prod, 200);
        }
        
    }
}
