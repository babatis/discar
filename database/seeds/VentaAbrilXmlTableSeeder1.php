<?php

use Illuminate\Database\Seeder;
use App\cliente;
use App\ventas;
use App\venta_dtl;
use App\productos;
use App\precio_ventas;

class VentaAbrilXmlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas')->delete();
        DB::table('venta_dtls')->delete();

        $path = public_path() . '/storage/xml/DTE_33_ABRIL.xml';
        // $path = public_path() . '/storage/xml/DTE_76944108_33_MAYO.xml';

        $SetDTE = simplexml_load_file($path);

        foreach ($SetDTE as $dte) {
            
        
            foreach ($dte->Documento->Encabezado as  $value) {

                print(' Folio -> ' . $value->IdDoc->Folio  . ' ');
                $client = New cliente;
                $ventas = New ventas;
                $client_id = $client->select('id')->where('rut', (string) $value->Receptor->RUTRecep)->first();
                $ventas->cliente_id = (string) $client_id->id;
                $ventas->neto = $value->Totales->MntNeto;
                $ventas->tasa_iva = $value->Totales->TasaIVA;
                $ventas->iva = $value->Totales->IVA;
                $ventas->total = $value->Totales->MntTotal;
                $ventas->total_real = $value->Totales->MntTotal;
                $ventas->created_at = $value->IdDoc->FchEmis;
                $ventas->updated_at  = $value->IdDoc->FchEmis;
                $ventas->save(['timestamps' => false]);

            }

            print('Venta -> ' . $ventas->id . ' / ');

            foreach ($dte->Documento->Detalle as  $value) {
                
                $prod = New Productos;
                $dtl = New venta_dtl;
                $prodVenta = New precio_ventas;

                $dtl->venta_id = $ventas->id;
                $dtl->item = $value->NroLinDet;
                $pd_id = str_replace('-', '', (string) $value->CdgItem->TpoCodigo) . '-' .  str_replace('\/', '/',$value->CdgItem->VlrCodigo);
                print(' Coginter -> ' .  $pd_id . ' ');
                $prod_id = $prod->select()->where('codinterno', (string) $pd_id)->first();
                // print(' prodid -> ' . $prod_id->id . ' ');
                // $prodVenta->select()->where('prod_id', (string) $prod_id->id)->first();
                // print(' costo-> '. $prodVenta );
                if (is_null($prod_id)) {
                    $dtl->prod_id = '0000';
                    $dtl->nombre = $value->NmbItem;
                    $dtl->pcosto = 0;
                } else {
                    $dtl->prod_id = (string) $prod_id->id;
                    $dtl->nombre = $value->NmbItem;
                    $prod_costo = $prodVenta->select()->where('prod_id', (string) $prod_id->id)->first();
                    $dtl->pcosto = $prod_costo->costotot;
                    $prod_id->activo = 1;
                    $prod_id->save();
                }   

                $dtl->cantidad = $value->QtyItem;
                $dtl->precio = $value->PrcItem;
                $dtl->monto = $value->MontoItem;
                $dtl->created_at = $ventas->created_at;
                $dtl->updated_at =  $ventas->updated_at;
                $dtl->save(['timestamps' => false]);

                print('/' . $value->NmbItem . '/');
            }
        }
    }
}
