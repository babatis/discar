<?php

namespace App\Http\Controllers;

use App\ventas;
use APP\cliente;
use App\venta_dtl;
use App\ventacliente;
use App\precio_ventas;
use App\ventas_dte;
use App\productos;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.create');
    }

    public function xmlcreate()
    {
        return view('venta.createxml');
    }

    public function apiUpXmlVenta(Request  $req){

        // $SetDTE = simplexml_load_file($req->file('file'));
        // $json = json_encode($SetDTE);
        // $array = json_decode($json, TRUE);

        // return response()->json($array, 200);

        return response()->json($req->all(), 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   
        /** CODIGO DE AGREGAR VENTA BUENO */
        $ventas = New ventas;
        $ventas->cliente_id = $req->input('cliente.id');
        $ventas->subtotal = $req->input('venta.sub');
        $ventas->neto = $req->input('venta.neto');
        $ventas->tasa_iva = 19;
        $ventas->iva = $req->input('venta.iva');
        $ventas->total = $req->input('venta.total');
        $ventas->total_real = $req->input('venta.total');
        $ventas->save();
  
        foreach ($req->input('dtll_prod') as  $value) {
               
            // $ver[] = $value->codinterno;

            $dtl = New venta_dtl;
            $dtl->venta_id = (int) $ventas->id;
            $dtl->item = $value['item'];
            if (isset($value['prod_id'])) {
                $dtl->prod_id = $value['prod_id'];
            }
            // if (isset($value['codinterno'])) {
            $dtl->codinterno = $value['codinterno'];
            // }
            $dtl->nombre = $value['nombre'];
            $dtl->pcosto = $value['costotot'];
            $dtl->cantidad = $value['cont'];
            $dtl->precio = $value['p3_neto'];
            $dtl->monto = $value['total']; 
            $dtl->save();

            $ver[] = $dtl->id;

            // Esto esta comentado
            // $dtl->venta_id = $ventas->id;
            // $dtl->item = $value->NroLinDet;
           
            // if (is_null($value->prod_id)) {
            //     $dtl->prod_id = '0000';
            //     $dtl->nombre = $value->nombre;
            //     $dtl->pcosto = 0;
            // } else {
            //     $dtl->prod_id = (string) $value->prod_id;
            //     $dtl->nombre = $value->nombre;
                
            //     $dtl->pcosto = $value->costotot;
            //     $prod->activo = 1;
            //     $prod->save();
            // }   

            // $dtl->cantidad = $value->cantidad;
            // $dtl->precio = $value->p3_neto;
            // $dtl->monto = $value->MontoItem;
            
            // $dtl->save();

            // $ver[] = $value['codinterno'];

        } 

        // return response()->json( $req->all(), 200);
        return response()->json(['Se guardo Correctamente', $ventas->id,  $ver ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show($ventas)
    {
        return view('venta.show', compact('ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ventas $ventas)
    {
        //
    }

    public function getApiVentaIndex(Request $request){

        if($request->get('search') === null){

            $venta = ventacliente::orderBy('id', 'DESC')->paginate(15);

        } else {

            $venta = ventacliente::orderBy('id', 'DESC')
                                ->where('rut', 'like', '%' . $request->get('search') . '%')
                                ->orwhere('nombrec', 'like' , '%' . $request->get('search') . '%')
                                ->orWhere('folio', 'like', '%' . $request->get('search') . '%')
                                ->orWhere('id', 'like', '%' . $request->get('search') . '%')
                                ->paginate(15);
        }

        $paginate = [
            'total' => $venta->total(),
            'current_page' => $venta->currentPage(),
            'per_page' => $venta->perPage(),
            'last_page' => $venta->lastPage(),
            'from' => $venta->firstItem(),
            'to' => $venta->lastPage(),
        ];

        return response()->json(['ventas' => $venta, 'paginate' => $paginate] , 200);

    }

    public function getApiVentaClientSearch($search = null){

        return response()->json( ventas::where('id', $search)->firstOrFail(), 200);

    }

    public function getApiVentaSearch($search = null){

        $venta = ventacliente::orderBy('id', 'DESC')
                            ->where('rut', 'like', '%'. $search . '%')
                            ->orwhere('nombrec', 'like' , '%'.$search.'%')
                            ->orWhere('folio', 'like', '%'. $search . '%')
                            ->orWhere('id', 'like', '%'. $search . '%')
                            ->get();

        return response()->json( $venta, 200);
    }

    public function getApiDtlIndex(){

        return response()->json( venta_dtl::orderBy('id', 'DESC')->get(), 200);
        
    }

    public function getApiVentaDtlsSearch($search = null){
        
        return response()->json( venta_dtl::where('venta_id', $search)->orderby('item', 'asc')->get() , 200) ;
    }

    public function getApiVentaDteSearch($search = null){
        return response()->json( ventas_dte::where('venta_id', $search)->get() , 200);
    }

    public function setApiBoleta(Request $req){

        $dtes = New ventas_dte;
        $dtes->venta_id = $req->input('venta_id');
        $dtes->tipodte = 35;
        $dtes->folio = $req->input('bolfolio');
        $dtes->fchemis = $req->input('setventa.created_at');
        $dtes->fchvenc = $req->input('setventa.created_at');
        $dtes->client_id = $req->input('cliente_id');
        $dtes->subtotal = $req->input('setventa.subtotal');
        $dtes->mntneto = $req->input('setventa.neto');
        $dtes->desc = 0;
        $dtes->tasaiva = $req->input('setventa.tasa_iva');
        $dtes->iva = $req->input('setventa.iva');
        $dtes->mnttotal = $req->input('setventa.total');
        $dtes->abono = $req->input('setventa.total');
        $dtes->tdteref = 802;
        $dtes->folioref = $req->input('setventa.id');
        $dtes->estado = 'PAG';
        $dtes->save();

        foreach ($req->input('setdtll') as $value) {
            $dtll = New productos;
            $prod = $dtll->where('codinterno', (string) $value['codinterno'])->first();
            // $cantidad = floatval($value['cantidad']);
            $prod->cantidad =  $prod->cantidad - floatval($value['cantidad']);
            $prod->save();
            // $dtll->save();   
        }
        
        return response()->json($prod, 200);

    }

    // public function setApiFactura(Request $req){

    //     $all = $req->all();
        
    //     return response()->json($all, 200);

    // }

    public function setApiFactura(Request $req){
        
        $dtes = New ventas_dte;
        $dtes->venta_id = $req->input('venta_id');
        $dtes->tipodte = 33;
        $dtes->folio = $req->input('fact.folio');
        $dtes->fchemis = $req->input('setventa.created_at');
        $dtes->fchvenc = $req->input('setventa.created_at');
        $dtes->client_id = $req->input('cliente_id');
        $dtes->subtotal = $req->input('fact.subtotal');
        $dtes->mntneto = $req->input('fact.neto');
        $dtes->desc = 0;
        $dtes->tasaiva = $req->input('setventa.tasa_iva');
        $dtes->iva = $req->input('fact.iva');
        $dtes->mnttotal = $req->input('fact.total');
        $dtes->tdteref = 802;
        $dtes->folioref = $req->input('setventa.id');
        // if($req->input('fact.fmapago') == 1){
        //     $dtes->estado = 'PAG';
        // } else {
        $dtes->estado = 'IMP';
        // }
        $dtes->save();

        foreach ($req->input('setdtll') as $value) {
            $dtll = New productos;
            $prod = $dtll->where('codinterno', (string) $value['codinterno'])->first();
            // $cantidad = floatval($value['cantidad']);
            $prod->cantidad =  $prod->cantidad - floatval($value['cantidad']);
            $prod->save();
            // $dtll->save();   
        }
        $all = $req->all();
        
        return response()->json($all, 200);
    }

    public function setApiPagoRecibo(){
        
    }

}
