<?php

namespace App\Http\Controllers;

use App\pagos;
use App\pagos_dtls;
use App\pago_venta;
use App\ventas_dte;
use App\ventas;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function apiStorePagoRecivo(Request $req){

        // return response()->json( $req->all(), 200);
         
        $pago = new pagos;
        $pago->client_id = $req->input('pago.client_id');
        $pago->ventas_dtes_id = $req->input('pago.venta_id');
        $pago->tipodte = $req->input('pago.tipodte');
        $pago->folio = $req->input('pago.folio');
        $pago->total = $req->input('pago.abono');
        $pago->save();

        foreach ($req->input('pago.dtll') as $value) {
            
            // dd($value['tipopago']);
            switch ($value['tipopago']) {
                case 1:
                    $pagod = new pagos_dtls;
                    $pagod->pagos_id = $pago->id;
                    $pagod->tipopago = (int) $value['tipopago'];
                    $pagod->folio = 'INT' . $pago->id;
                    $pagod->total = (int) $value['total'];
                    $pagod->fcha_pago = $value['fchpago'];
                    $pagod->save();
                break;
                case 2:
                    $pagod = new pagos_dtls;
                    $pagod->pagos_id = $pago->id;
                    $pagod->tipopago = (int) $value['tipopago'];
                    $pagod->folio = $value['folio'];
                    $pagod->banco = $value['banco'];
                    $pagod->cta_cte = $value['cta_cte'];
                    $pagod->titular = $value['titular'];
                    $pagod->total = (int) $value['total'];
                    $pagod->fcha_pago = $value['fchpago'];
                    $pagod->save();
                break;
                case 3:
                    $pagod = new pagos_dtls;
                    $pagod->pagos_id = $pago->id;
                    $pagod->tipopago = (int) $value['tipopago'];
                    $pagod->folio = $value['folio'];
                    $pagod->tipotarjeta = $value['tipotarjeta'];
                    $pagod->cuotas = $value['cuotas'];
                    $pagod->total = (int) $value['total'];
                    $pagod->fcha_pago = $value['fchpago'];
                    $pagod->save();
                break;
                case 4:
                    $pagod = new pagos_dtls;
                    $pagod->pagos_id = $pago->id;
                    $pagod->tipopago = (int) $value['tipopago'];
                    $pagod->folio = $value['folio'];
                    $pagod->tipotarjeta = $value['banco'];
                    $pagod->cuotas = $value['cta_cte'];
                    $pagod->total = (int) $value['total'];
                    $pagod->fcha_pago = $value['fchpago'];
                    $pagod->save();
                break;
                case 5:
                    $pagod = new pagos_dtls;
                    $pagod->pagos_id = $pago->id;
                    $pagod->tipopago = (int) $value['tipopago'];
                    $pagod->folio = $value['folio'];
                    $pagod->total = (int) $value['total'];
                    $pagod->fcha_pago = $value['fchpago'];
                    $pagod->save();
                break;
            }

        }

        $vent = ventas::findOrFail( (int) $req->input('pago.venta_id'));

        $dte = ventas_dte::where([['tipodte', '=', $req->input('pago.tipodte')],
                                  ['folio', '=', $req->input('pago.folio')]
                                 ])->first();

        $dte->abono = $dte->abono + (int) $req->input('pago.abono');
        $dte->save();
        $vent->abono = $dte->abono;
        $vent->save();

        $saldo = intval($dte->mnttotal) - intval($dte->abono);
        
        if ($saldo == 0) {
            $dte->estado = 'PAG';
            $dte->save();
            $vent->estado = 'PAG';
            $vent->save();
        }

        return response()->json([$dte, $saldo], 200);
    }

    public function apiStorePago(Request $req)
    {
        // $pago = new pagos;

        // foreach ($variable as $value) {
    
        
        //     switch ($variable) {
        //         case 'value':
        //             # code...
        //             break;
                
        //         default:
        //             # code...
        //             break;
        //     }

        // }
    }

    public function apiIndexPagoVenta( Request $req){

        $pagos = pago_venta::where('ventas_dtes_id', $req->input('venta_id'))->get();
        return response()->json($pagos, 200);
    }
}
