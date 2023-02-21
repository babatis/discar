<?php

namespace App\Http\Controllers;

use App\contacto_prov;
use App\proveedores;
use App\nota_prov;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    function __construct(proveedores $prov)
    {
        $this->prov = $prov;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $provs = $this->prov->select( 'prov_id', 'rut', 'nombre','direccion', 'ciudad', 'comuna', 'pais', 'actividad', 'fono', 'email')
        //                     ->paginate(15);

        return view('prov.index');

    }

    public function search(Request $req)
    {
        $search = $req->input('search');

        if(isset($search)){

            $provs = $this->prov->select( 'id', 'rut', 'nombre','direccion', 'ciudad', 'comuna', 'pais', 'actividad', 'fono', 'email')
                            ->where('rut', 'like', '%'. $search . '%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->paginate(15);

        }else{
            $provs = $this->prov->select( 'id', 'rut', 'nombre','direccion', 'ciudad', 'comuna', 'pais', 'actividad', 'fono', 'email')
                                ->paginate(15);
        }
        
                            
        return view('prov.index', compact('provs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'Crear Proveedor';
        return view('prov.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       
        $prov_id = proveedores::where('rut', $req->input('prov.rut'))->first();

        if( isset($prov_id)) {
            
            return response()->json('Existe el Provedor', 200);
            
        
        } else {

            $provee = New proveedores;
            $provee->rut = $req->input('prov.rut');
            $provee->nombre = $req->input('prov.nombre');
            $provee->giro = $req->input('prov.giro');
            $provee->direccion = $req->input('prov.direccion');
            $provee->ciudad = $req->input('prov.ciudad');
            $provee->comuna = $req->input('prov.comuna');
            $provee->pais = $req->input('prov.pais');
            $provee->fono = $req->input('prov.fono');
            $provee->email = $req->input('prov.email');
            $provee->save();

        }

        return response()->json('Se a guardado el Provedor', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show($proveedores)
    {   
        return view('prov.show', compact('proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedores $proveedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(proveedores $proveedores)
    {
        //
    }

    public function apiName($rut)
    {
        return response()->json( proveedores::where('rut', $rut)->get(), 200);
    }

    public function apiIdName($rut)
    {
        return response()->json( proveedores::where('id', $rut)->get(), 200);
    }
    
    public function apiAllSearch($search = null)
    {
        if(isset($search)){
            $provs = proveedores::where('rut', 'like', '%'. $search . '%')
                            ->orWhere('nombre', 'like', '%'. $search . '%')
                            ->get();
        } else {
            $provs = proveedores::get();
        }

        return response()->json($provs, 200);
    }

    public function apiIndex(){
        return response()->json(  proveedores::get(), 200);
    }

    public function apiShowProveedor($search = null){
        return response()->json(  proveedores::where('id', $search)->firstOrFail(), 200);
    }

    public function apiGetContacProv($search = null){
        return response()->json( contacto_prov::where('prov_id', $search )->get(), 200);
    }

    public function apiStoreContacProv(Request $req){

        $req->validate([
            'nombre' => 'required'
        ]);
        
        $contac = new contacto_prov;
        $contac->prov_id = $req->input('prov_id');
        $contac->nombre = $req->input('nombre');
        $contac->cargo  = $req->input('cargo');
        $contac->fono = $req->input('fono');
        $contac->celular = $req->input('celular');
        $contac->WhatsApp = $req->input('WhatsApp');
        $contac->email = $req->input('email');
        $contac->nota = $req->input('nota');
        $contac->save();

        return response()->json( 'Se a guardado el Nuevo Contacto', 200);
        // return response()->json( $req->all(), 200);
    }

    public function apiStoreNotaProv(Request $req){
        
        $nota = new nota_prov;
        $nota->prov_id =  $req->input('prov_id');
        $nota->titulo = $req->input('titulo');
        $nota->nota = $req->input('nota');
        $nota->save();

        return response()->json('Se gurado la Nueva Nota', 200);

    }

    public function apiGetNotaProv($search = null){

        return response()->json( nota_prov::where('prov_id', $search )->get(), 200);
    }

    public function apiUpMemoprov(Request $req){

        $prov = proveedores::where('id', $req->input('id') )->first();
        $prov->memo = $req->input('memo');
        $prov->save();
        
        return response()->json('Se gurado el Memo' , 200);
    }

    public function apiUpObserprov(Request $req){

        $prov = proveedores::where('id', $req->input('id') )->first();
        $prov->observacion = $req->input('observacion');
        $prov->save();
        
        return response()->json('Se gurado el Memo' , 200);

    }
    
}
