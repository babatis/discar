<?php

namespace App\Http\Controllers;

use App\xmldte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class XmldteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $path = public_path() . '/storage/xml/DTE_76944108_33_DICIEMBRE.xml';
        // $path = Storage::get('DTE_01_04.xml');
        $SetDTE = simplexml_load_file($path);
        $json = json_encode($SetDTE);
        $array = json_decode($json, TRUE);
        return view('xml.index', compact('SetDTE'));
        // print_r($SetDTE);
        // return $array;
    }

    public function getMayo()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_MAYO.xml';
        $SetDTE = simplexml_load_file($path);
        $json = json_encode($SetDTE);
        $array = json_decode($json, TRUE);
        return view('xml.index', compact('SetDTE'));
    }

    public function getJunio()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_JUNIO.xml';
        $SetDTE = simplexml_load_file($path);
        $json = json_encode($SetDTE);
        $array = json_decode($json, TRUE);

        // print_r($array);

        return view('xml.index', compact('SetDTE'));
    }

    public function indexNotaCredito()
    {
        // $path = public_path() . '/storage/xml/DTE_TpoDoc61_01_30_04_19.xml';
       
        // $SetDTE = simplexml_load_file($path);
       
        // return view('xml.index', compact('SetDTE'));
        return 'hola mundo';
       
    }

    public function getJsonCliente()
    {
        $path = public_path() . '/storage/xml/DTE_33_ABRIL.xml';
        // $path = Storage::get('DTE_01_04.xml');
        $SetDTE = simplexml_load_file($path);

        $cliente = array();
        $clientes = array();
        foreach ($SetDTE->DTE as $dte) {
           foreach ($dte->Documento->Encabezado->Receptor as $enc ) {
               $cliente['RUTRecep'] =  utf8_decode($enc->{"RUTRecep"});
               $cliente['RznSocRecep'] =  utf8_decode($enc->{"RznSocRecep"});
               $cliente['GiroRecep'] =  utf8_decode($enc->{"GiroRecep"});
               $cliente['DirRecep'] =  utf8_decode($enc->{"DirRecep"});
               $cliente['CiudadRecep'] =  utf8_decode($enc->{"CiudadRecep"});
               $cliente['CmnaRecep'] =  utf8_decode($enc->{"CmnaRecep"});
               array_push($clientes, $cliente);
            // echo ' - ' . utf8_decode($enc->RznSocRecep);
           }
            
        }

        dd($clientes);
        
        // $json = json_encode($clientes, JSON_UNESCAPED_UNICODE);
        // $array = json_decode($json, false, 512, JSON_UNESCAPED_UNICODE);
        // $header = array (
        //     'Content-Type' => 'application/json; charset=UTF-8',
        //     'charset' => 'utf-8'
        // );
        return response()->json( $clientes, 200);
        // return $cliente;
        // return view('xml.index', compact('array'));
    }

    public function getJsonClienteMayo()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_MAYO.xml';
        // $path = Storage::get('DTE_01_04.xml');
        $SetDTE = simplexml_load_file($path);

        $cliente = array();
        $clientes = array();
        foreach ($SetDTE->DTE as $dte) {
           foreach ($dte->Documento->Encabezado->Receptor as $enc ) {
               $cliente['RUTRecep'] =  utf8_decode($enc->{"RUTRecep"});
               $cliente['RznSocRecep'] =  utf8_decode($enc->{"RznSocRecep"});
               $cliente['GiroRecep'] =  utf8_decode($enc->{"GiroRecep"});
               $cliente['DirRecep'] =  utf8_decode($enc->{"DirRecep"});
               $cliente['CiudadRecep'] =  utf8_decode($enc->{"CiudadRecep"});
               $cliente['CmnaRecep'] =  utf8_decode($enc->{"CmnaRecep"});
               array_push($clientes, $cliente);
            // echo ' - ' . utf8_decode($enc->RznSocRecep);
           }
            
        }
        
        // $json = json_encode($cliente, JSON_UNESCAPED_UNICODE);
        // $array = json_decode($json, false, 512, JSON_UNESCAPED_UNICODE);
        // $header = array (
        //     'Content-Type' => 'application/json; charset=UTF-8',
        //     'charset' => 'utf-8'
        // );
        // return response()->json( $clientes, 200);
        return $clientes;
        // return view('xml.index', compact('array'));
    }

    public function indexJsonDoc()
    {
        $path = public_path() . '/storage/xml/DTE_33_ABRIL.xml';
       
        $SetDTE = simplexml_load_file($path);
        // $json = json_encode($SetDTE);
       
        $dtls = array();
        $dtl = array();
        foreach ($SetDTE->DTE as $dte) {
            foreach ($dte->Documento->Encabezado as $enc ) {
                
                $dtl['TipoDTE'] = (string) $enc->IdDoc->{'TipoDTE'} ;
                $dtl['TipoDTE'] = (string) $enc->IdDoc->{'TipoDTE'} ;
                $dtl['TipoDTE'] = (string) $dte->Documento->Encabezado->IdDoc->{'TipoDTE'} ;

            }
             
        }
    }

    public function getJsonDtl()
    {
        $path = public_path() . '/storage/xml/DTE_33_ABRIL.xml';
       
        $SetDTE = simplexml_load_file($path);
        // $json = json_encode($SetDTE);
       
        $dtls = array();
        $dtl = array();
        foreach ($SetDTE as $dte) {

            $dtl['TipoDTE'] = (string) $dte->Documento->Encabezado->IdDoc->{'TipoDTE'} ;
            $dtl['Folio'] = (string) $dte->Documento->Encabezado->IdDoc->{'Folio'};
            $dtl['FchEmis'] = (string) $dte->Documento->Encabezado->IdDoc->{'FchEmis'};
            
            foreach ($dte->Documento->Detalle as  $value) {

              

                $dtl['NroLinDet']  = (string) $value->{'NroLinDet'};
                $dtl['CdgItem'] = str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) . '-' .  str_replace('\/', '/',$value->CdgItem->{'VlrCodigo'});
                $dtl['TpoCodigo'] = str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) ;
                $dtl['VlrCodigo'] = str_replace('\/', '/', (string) $value->CdgItem->{'VlrCodigo'});
                $dtl['NmbItem'] = (string) $value->{'NmbItem'};
                $dtl['QtyItem'] = (string) $value->{'QtyItem'};
                $dtl['PrcItem'] = (string) $value->{'PrcItem'};
                $dtl['MontoItem'] = (string) $value->{'MontoItem'};
              
                array_push($dtls, $dtl);
            }
        
        }

        $json = json_encode($dtls);
        $array = json_decode($json, TRUE);
        // return $dtls;
        return $array;
    }

    public function getJsonDtlMayo()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_MAYO.xml';
       
        $SetDTE = simplexml_load_file($path);
        // $json = json_encode($SetDTE);
       
        $dtls = array();
        $dtl = array();
        foreach ($SetDTE as $dte) {

            $dtl['TipoDTE'] = (string) $dte->Documento->Encabezado->IdDoc->{'TipoDTE'} ;
            $dtl['Folio'] = (string) $dte->Documento->Encabezado->IdDoc->{'Folio'};
            $dtl['FchEmis'] = (string) $dte->Documento->Encabezado->IdDoc->{'FchEmis'};
            
            foreach ($dte->Documento->Detalle as  $value) {

              

                $dtl['NroLinDet']  = (string) $value->{'NroLinDet'};
                $dtl['CdgItem'] = str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) . '-' .  str_replace('\/', '/',$value->CdgItem->{'VlrCodigo'});
                $dtl['TpoCodigo'] = str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) ;
                $dtl['VlrCodigo'] = str_replace('\/', '/', (string) $value->CdgItem->{'VlrCodigo'});
                $dtl['NmbItem'] = (string) $value->{'NmbItem'};
                $dtl['QtyItem'] = (string) $value->{'QtyItem'};
                $dtl['PrcItem'] = (string) $value->{'PrcItem'};
                $dtl['MontoItem'] = (string) $value->{'MontoItem'};
              
                array_push($dtls, $dtl);
            }
        
        }

        $json = json_encode($dtls);
        $array = json_decode($json, TRUE);
        // return $dtls;
        return $array;
    }


    public function indexJsonDtl2()
    {
        $path = public_path() . '/storage/xml/DTE_33_ABRIL.xml';
       
        $SetDTE = simplexml_load_file($path);
        // $json = json_encode($SetDTE);
       
        $dtls = array();
        $dtl = array();
        foreach ($SetDTE as $dte) {
   
            foreach ($dte->Documento->Detalle as  $value) {

            $dtl += array(
                
                'TipoDTE' => (string) $dte->Documento->Encabezado->IdDoc->{'TipoDTE'},
                'Folio' => (string) $dte->Documento->Encabezado->IdDoc->{'Folio'},
                'FchEmis' => (string) $dte->Documento->Encabezado->IdDoc->{'FchEmis'},
                'NroLinDet' => (string) $value->{'NroLinDet'},
                'CdgItem' => str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) . '-' .  str_replace('\/', '/',$value->CdgItem->{'VlrCodigo'}),
                'TpoCodigo' => str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) ,
                'VlrCodigo' => str_replace('\/', '/', (string) $value->CdgItem->{'VlrCodigo'}),
                'NmbItem' => (string) $value->{'NmbItem'},
                'QtyItem' => (string) $value->{'QtyItem'},
                'PrcItem' => (string) $value->{'PrcItem'},
                'MontoItem' => (string) $value->{'MontoItem'}
              
            );

            }

            array_push($dtls, $dtl);
        }

        $json = json_encode($dtls);
        $array = json_decode($json, TRUE);
        // return $dtls;
        return $array;
    }

    public function getPedido() {

        // $path = public_path() . '/storage/DTE_Emitidos_76944108_Receptor77616080-6_v1.xml';
        $path = public_path() . '/storage/DTE_Emitidos_76944108_Receptor77616080-6_v2.xml';
        $SetDTE = simplexml_load_file($path);
        $json = json_encode($SetDTE);
        $array = json_decode($json, TRUE);
        return view('xml.index', compact('SetDTE'));

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
     * @param  \App\xmldte  $xmldte
     * @return \Illuminate\Http\Response
     */
    public function show(xmldte $xmldte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\xmldte  $xmldte
     * @return \Illuminate\Http\Response
     */
    public function edit(xmldte $xmldte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\xmldte  $xmldte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, xmldte $xmldte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\xmldte  $xmldte
     * @return \Illuminate\Http\Response
     */
    public function destroy(xmldte $xmldte)
    {
        //
    }
}
