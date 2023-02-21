<?php

namespace App\Http\Controllers;

use App\compras;
use App\compras_dtls;
use App\productos;
use App\precio_ventas;
use App\proveedores;
use App\compraprov;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $req)
    // {
    //     $provid = proveedores::select()->where('id', $req->prov{'id'})->first();

    //     return response()->json($provid,200);
    // }

    public function store(Request $req)
    {
        
        print_r($req->all());

        $existe = compraprov::where([
                                      ['rut', $req->prov{'rut'}],
                                      ['tipodte', $req->compra{'tipodoc'}],
                                      ['folio', $req->compra{'folio'}]    
                                    ])->first();

        // dd($existe);

        if ($existe !== null){
            return response()->json('Esta Factura ya existe ... ', 200);
        }

        $provid = proveedores::where('rut', $req->input('prov.rut'))->first();

        if($provid === null){
            
            $nprov = New proveedores;
            $nprov->rut = $req->prov{'rut'};
            $nprov->nombre = $req->prov{'nombre'};
            $nprov->save();

            $compra = New compras;
            $compra->tipodte = $req->compra{'tipodoc'};
            $compra->folio = $req->compra{'folio'};
            $compra->fchingres = $req->compra{'fchingrso'};
            $compra->fchemis = $req->compra{'fchemite'};
            $compra->fchvenc = $req->compra{'fchvence'};
            // $compra->prov_id = $req->compra{''};
            $compra->prov_id = (string) $nprov->id;
            $compra->subtotal = $req->tot{'subtotal'};
            $compra->mntneto = $req->tot{'neto'};
            // $req->tot{'monto'}
            $compra->desc = 0;
            $compra->tasaiva = 19;
            $compra->iva = $req->tot{'iva'};
            $compra->mnttotal = $req->tot{'total'};
            $compra->estado = 'IMP';
            $compra->nota = $req->nota;
            $compra->save();

            $provid = $nprov;
            $comp_id = $compra->id;

        } else {

            $compra = New compras;
            $compra->tipodte = $req->compra{'tipodoc'};
            $compra->folio = $req->compra{'folio'};
            $compra->fchingres = $req->compra{'fchingrso'};
            $compra->fchemis = $req->compra{'fchemite'};
            $compra->fchvenc = $req->compra{'fchvence'};
            // $compra->prov_id = $req->compra{''};
            $compra->prov_id = $provid->id;
            $compra->subtotal = $req->tot{'subtotal'};
            $compra->mntneto = $req->tot{'neto'};
            // $req->tot{'monto'}
            $compra->desc = 0;
            $compra->tasaiva = 19;
            $compra->iva = $req->tot{'iva'};
            $compra->mnttotal = $req->tot{'total'};
            $compra->estado = 'IMP';
            $compra->nota = $req->nota;
            $compra->save();

            $comp_id = $compra->id;
        }
        
        $comp_id = $compra->id;

        foreach ($req->dtll_prod as $value) 
        {
           

            $prod_id =  productos::where('codinterno', '=', (string) $value['codinterno'])->first();

            if($prod_id === null){

                $nprod = New productos;
                $nprod->slug = Str::slug($value['codinterno'], '-').'-'. Str::random(5);
                $nprod->codinterno = $value['codinterno'];
                // $nprod->barcode = $value['barcode'];
                $nprod->nombre = $value['nombre'];
                // $nprod->descripcion = $value['descripcion'];
                $nprod->linea = $value['linea'];
                $nprod->familia = $value['familia'];
                $nprod->marca = $value['marca'];
                $nprod->unidad = $value['unidad'];
                $nprod->cantidad = $value['cantidad'];
                $nprod->activo = 1;
                $nprod->save();

                 // print($value['item'] . '-' );
                $comp_dtl = new compras_dtls;
                $comp_dtl->compra_id  = $comp_id;
                $comp_dtl->item = $value['item'];
                // $comp_dtl->prod_id = $input;
                $comp_dtl->prod_id = $nprod->id;
                $comp_dtl->codinterno = $value['codinterno'];
                $comp_dtl->nombre = $value['nombre'];
                $comp_dtl->pcosto = $value['pcosto'];
                $comp_dtl->cantidad = $value['cantidad'];
                // $comp_dtl->dsct1 = $value['desct'];
                if($value['desct1'] === null){
                    $comp_dtl->dsct1 = 0;
                } else {
                    $comp_dtl->dsct1 = $value['desct1'];
                }
                if($value['desct2'] === null){
                    $comp_dtl->dsct2 = 0;
                } else {
                    $comp_dtl->dsct2 = $value['desct2'];
                }
    
                $comp_dtl->precio = $value['pcosto'];
                $comp_dtl->monto = $value['subtotal'];
                $comp_dtl->save();


                $nppv = New precio_ventas;
                $nppv->prod_id = $nprod->id;
                $nppv->prov_id = $provid->id;
                $nppv->nfactura = $req->compra{'folio'};
                $nppv->pcosto =  $value['pcosto'];
                $nppv->cantidad = $value['cantidad'] ;
                $nppv->desct1 =  $value['desct1'];
                $nppv->desct2 =  $value['desct2'];
                $nppv->flete =  $value['flete'];
                $nppv->costotot =  $value['costfinal'];
                $nppv->p1_neto =  $value['p1_neto'] ;
                $nppv->p1_iva =  $value['p1_iva'];
                $nppv->p1_venta =  $value['p1_venta'];
                $nppv->p2_neto =  $value['p2_neto'];
                $nppv->p2_iva =  $value['p2_iva'];
                $nppv->p2_venta =  $value['p2_venta'];
                $nppv->p3_neto =  $value['p3_neto'];
                $nppv->p3_iva =  $value['p3_iva'];
                $nppv->p3_venta =  $value['p3_venta'];
                $nppv->activo =  1;
                $nppv->save();


            } else {

                $prod_id->cantidad = $prod_id->cantidad + (int) $value['cantidad'];
                $prod_id->activo = 1;
                $prod_id->save();

                // print($value['item'] . '-' );
                $comp_dtl = new compras_dtls;
                $comp_dtl->compra_id  = $comp_id;
                $comp_dtl->item = $value['item'];
                // $comp_dtl->prod_id = $input;
                $comp_dtl->prod_id = (string) $prod_id->id;
                $comp_dtl->codinterno = $value['codinterno'];
                $comp_dtl->nombre = $value['nombre'];
                $comp_dtl->pcosto = $value['costfinal'];
                $comp_dtl->cantidad = $value['cantidad'];
                // $comp_dtl->dsct1 = $value['desct'];
                if($value['desct1'] === null){
                    $comp_dtl->dsct1 = 0;
                } else {
                    $comp_dtl->dsct1 = $value['desct1'];
                }
                if($value['desct2'] === null){
                    $comp_dtl->dsct2 = 0;
                } else {
                    $comp_dtl->dsct2 = $value['desct2'];
                }
    
                $comp_dtl->precio = $value['pcosto'];
                $comp_dtl->monto = $value['subtotal'];
                $comp_dtl->save();

                $ppv = precio_ventas::select()->where([
                                ['prod_id', '=', $prod_id->id],
                                ['activo', '=', 1]
                                ])->first();                     

                if ($ppv !== null){
                    $ppv->activo = 0;
                    $ppv->save();
                }
                   
                $nppv = New precio_ventas;
                $nppv->prod_id = $prod_id->id;
                $nppv->prov_id = $provid->id;
                $nppv->nfactura = $req->compra{'folio'};
                $nppv->pcosto =  $value['pcosto'];
                $nppv->cantidad = $value['cantidad'] ;
                $nppv->desct1 =  $value['desct1'];
                $nppv->desct2 =  $value['desct2'];
                $nppv->flete =  $value['flete'];
                $nppv->costotot =  $value['costfinal'];
                $nppv->p1_neto =  $value['p1_neto'] ;
                $nppv->p1_iva =  $value['p1_iva'];
                $nppv->p1_venta =  $value['p1_venta'];
                $nppv->p2_neto =  $value['p2_neto'];
                $nppv->p2_iva =  $value['p2_iva'];
                $nppv->p2_venta =  $value['p2_venta'];
                $nppv->p3_neto =  $value['p3_neto'];
                $nppv->p3_iva =  $value['p3_iva'];
                $nppv->p3_venta =  $value['p3_venta'];
                $nppv->activo =  1;
                $nppv->save();

            }

        }
       
        return response()->json('Se Guardo Correctamente',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show($compras)
    {
        return view('comp.show', compact('compras'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function edit(compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(compras $compras)
    {
        //
    }

    public function getApiCompras(Request $request){

        // return response()->json( compras::orderBy('id', 'DESC')->get(), 200);
        if($request->get('search') === null){

            $compra =  compraprov::paginate(15);

        } else {

            $compra = compraprov::orderBy('id', 'DESC')
                                ->where('rut', 'like', '%' . $request->get('search') . '%')
                                ->orwhere('nombre', 'like' , '%' . $request->get('search') . '%')
                                ->orWhere('folio', 'like', '%' . $request->get('search') . '%')
                                ->orWhere('id', 'like', '%' . $request->get('search') . '%')
                                ->paginate(15);
        }

        $paginate = [
            'total' => $compra->total(),
            'current_page' => $compra->currentPage(),
            'per_page' => $compra->perPage(),
            'last_page' => $compra->lastPage(),
            'from' => $compra->firstItem(),
            'to' => $compra->lastPage(),
        ];

        return response()->json(['compras' => $compra, 'paginate' => $paginate] , 200);

    }

    public function getCompProv(){

        return response()->json( compraprov::orderBy('rut', 'DESC')->get(), 200);
    }

    public function getApiComprasId($search = null){

        return response()->json( compraprov::where('id', $search)->first(), 200);
    }

    public function getApiVentaDtlId($search = null){
        return response()->json( compras_dtls::where('compra_id', $search)->get(), 200);
    }

    public function getApiCompraIndex(Request $request){

        if($request->get('search') === null){
            
        }
    }

    public function getApiComprasFolio(Request $req){

        $dte = compras::where([
                        ['prov_id', '=', $req->get('prov_id')],
                        ['tipodte', '=', $req->get('tipodoc')],
                        ['folio', '=', $req->get('folio')]
                    ])->first();

        if($dte === null){
            return response()->json(['existe' => 0, 'sql' => $dte, $req->all()], 200);
        } else {
            return response()->json(['existe' => 1, 'sql' => $dte, $req->all()], 200);
        }

        // return response()->json($req->all());
    }
    

}
