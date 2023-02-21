<?php

namespace App\Http\Controllers;

use App\cliente;
// use App\allclientes; //TODO: ELIMINAR
use App\ventas_dte;
use App\contacto_client;
use App\nota_client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        $client = new cliente;
        $client->rut = $req->input('client.rut');
        $client->nombre = $req->input('client.nombre');
        $client->direccion = $req->input('client.domicilio');
        $client->pais = $req->input('client.pais');
        $client->region = $req->input('client.REGION');
        $client->ciudad = $req->input('client.CIUDAD');
        $client->comuna = $req->input('client.COMUNA');
        $client->giro = $req->input('client.actividad');
        $client->fono = $req->input('client.fono');
        $client->email = $req->input('client.email');
        // $client->url = $req->input('client.url');
        $client->save();

        return response()->json('Se guardo un Nuevo Cliente', 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        return view('client.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }

    public function apiIndex(Request $request){

        if($request->get('search') === null){

            $cliente = cliente::paginate(15);

        } else {

            $cliente = cliente::where('rut', 'like', '%'.$request->get('search').'%')
                                ->orwhere('nombre', 'like', '%'.$request->get('search').'%')
                                ->paginate(15);

        }

        $paginate = [
            'total' => $cliente->total(),
            'current_page' => $cliente->currentPage(),
            'per_page' => $cliente->perPage(),
            'last_page' => $cliente->lastPage(),
            'from' => $cliente->firstItem(),
            'to' => $cliente->lastPage(),
        ];
        
        return response()->json( ['clientes' => $cliente, 'paginate' => $paginate], 200);
    }

    public function apiAllIndex(){

        return response()->json( allclientes::get(), 200);
    }

    public function apiAllSearch($search = null){
        
        if(isset($search)){
            $allClient = allclientes::where('rut', 'like', '%'.$search.'%')
                                      ->orwhere('nombre', 'like', '%'.$search.'%')
                                      ->get();
        } else {
            $allClient = allclientess::get();
        }

        return response()->json( $allClient, 200);
    }

    public function apiSearch($search = null){

        if(isset($search)){
            $Client = cliente::where('rut', 'like', '%'.$search.'%')
                               ->orwhere('nombre', 'like', '%'.$search.'%')
                               ->get();
        } else {
            $Client = cliente::get();
        }

        return response()->json( $Client, 200);
    }

    public function apiSearchClientVenta($search){

        return response()->json( cliente::where('id', intval( $search))->firstOrFail() , 200);
    }

    public function apiClienteDTESearch(request $request){

        $search = (int) $request->get('client');

        $dte = ventas_dte::where('client_id', $search)
                            ->orderBy('venta_id', 'dec')
                            ->paginate(12);

        $paginate = [
            'total' => $dte->total(),
            'current_page' => $dte->currentPage(),
            'per_page' => $dte->perPage(),
            'last_page' => $dte->lastPage(),
            'from' => $dte->firstItem(),
            'to' => $dte->lastPage(),
        ];

        return response()->json( ['dte' => $dte, 'paginate' => $paginate] , 200);

    }

   public function apiGetContacClient($search = null){
        return response()->json( contacto_client::where('client_id', $search)->get(), 200);
   }

   public function apiStoreContacClient(Request $req){

        // $req->validate([
        //     'nombre' => 'required'
        // ]);

        $contac = new contacto_client;
        $contac->client_id = $req->input('client_id');
        $contac->nombre = $req->input('nombre');
        $contac->cargo  = $req->input('cargo');
        $contac->fono = $req->input('fono');
        $contac->celular = $req->input('celular');
        $contac->WhatsApp = $req->input('WhatsApp');
        $contac->email = $req->input('email');
        $contac->nota = $req->input('nota');
        $contac->save();

        return response()->json( 'Se a guardado el Nuevo Contacto', 200);
   }

    public function apiGetNotaClient($search = null){

        return response()->json( nota_client::where('client_id', $search )->get(), 200);
    }
    
    public function apiStoreNotaClient(Request $req){

        $nota = new nota_client;
        $nota->client_id =  $req->input('client_id');
        $nota->titulo = $req->input('titulo');
        $nota->nota = $req->input('nota');
        $nota->save();

        return response()->json( 'Se a guardado el Nuevo Contacto', 200);

        // return response()->json($req->all(), 200);
    }

}
