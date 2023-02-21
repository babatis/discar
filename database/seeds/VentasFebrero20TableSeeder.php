<?php

use App\cliente;
use App\ventas;
use App\venta_dtl;
use App\productos;
use App\precio_ventas;
use App\ventas_dte;
use Illuminate\Database\Seeder;

class VentasFebrero20TableSeeder extends Seeder
{
    
    public function xsortdte($nodes, $order = SORT_DESC)
    {
        $sort_proxy = array();

        $dtes = $nodes->xpath('/SetDTE/DTE/Documento/Encabezado/IdDoc');
    
        foreach ( $dtes as $k => $node) {
            
            $sort_proxy[$k] = (string) $node->Folio;
        
        } 

        array_multisort($sort_proxy, $order, $dtes);

        return $dtes;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_FEBRERO_20.xml';

        $SetDTE = simplexml_load_file($path);

        $exams = Self::xsortdte($SetDTE, SORT_ASC);

        foreach ($exams as $exam) {
            
            print('Exam.Folio ->' . $exam->Folio);
        
            foreach ($SetDTE as $dte) {
                
                if ($dte->Documento->Encabezado->IdDoc->Folio == $exam->Folio) {
                
                    foreach ($dte->Documento->Encabezado as  $value) {

                        print(' Folio -> ' . $value->IdDoc->Folio  . ' ');
                        $client = New cliente;
                        $ventas = New ventas;
                        $client_id = $client->select('id')->where('rut', (string) $value->Receptor->RUTRecep)->first();
                        print('Cliente-id -> '.  $client_id);

                        $exit = ventas_dte::where([
                                                    ['tipodte', $value->IdDoc->TipoDTE],
                                                    ['folio', $value->IdDoc->Folio]
                                                ])->first();
                        
                        if ($exit === null) {
                           
                            $ventas->cliente_id = (string) $client_id->id;
                            $ventas->subtotal = $value->Totales->MntNeto;
                            $ventas->neto = $value->Totales->MntNeto;
                            $ventas->tasa_iva = $value->Totales->TasaIVA;
                            $ventas->iva = $value->Totales->IVA;
                            $ventas->total = $value->Totales->MntTotal;
                            $ventas->total_real = $value->Totales->MntTotal;
                            $ventas->fmapago = $value->IdDoc->FmaPago;
                            $ventas->estado = 'IMP';
                            $ventas->created_at = $value->IdDoc->FchEmis;
                            $ventas->updated_at  = $value->IdDoc->FchEmis;
                            $ventas->save(['timestamps' => false]);

                            $dtes = New ventas_dte;
                            $dtes->venta_id = $ventas->id;
                            $dtes->tipodte = $value->IdDoc->TipoDTE;
                            $dtes->folio = $value->IdDoc->Folio;
                            $dte->created_at = $value->IdDoc->FchEmis;
                            $dtes->fchemis = $value->IdDoc->FchEmis;
                            $dtes->fchvenc = $value->IdDoc->FchEmis;
                            $dtes->client_id = $client_id->id;
                            $dtes->subtotal = $value->Totales->MntNeto;
                            $dtes->mntneto = $value->Totales->MntNeto;
                            $dtes->desc = 0;
                            $dtes->tasaiva = $value->Totales->TasaIVA;
                            $dtes->iva = $value->Totales->IVA;
                            $dtes->mnttotal = $value->Totales->MntTotal;
                            $dtes->estado = 'IMP';
                            $dtes->tdteref = 802;
                            $dtes->folioref = $ventas->id;
                            $dtes->save();

                        }
                    }

                    print('Venta -> ' . $ventas->id . ' / ');

                    foreach ($dte->Documento->Detalle as  $value) {
                        
                        $prod = New Productos;
                        $dtl = New venta_dtl;
                        $prodVenta = New precio_ventas;

                        $dtl->venta_id = $ventas->id;
                        $dtl->item = $value->NroLinDet;

                        $TpoCodigo = $value->CdgItem->TpoCodigo;
                        $pd_id = str_replace('-', '', (string) $value->CdgItem->{'TpoCodigo'}) . '-' .  str_replace('\/', '/', (string) $value->CdgItem->{'VlrCodigo'});
                        print(' Coginter -> ' .  $pd_id . ' ');
                        $prod_id = $prod->select()->where('codinterno', (string) $pd_id)->first();
                        // print(' prodid -> ' . $prod_id->id . ' ');
                        // $prodVenta->select()->where('prod_id', (string) $prod_id->id)->first();
                        // print(' costo-> '. $prodVenta );
                        if (is_null($prod_id)) {
                            $dtl->prod_id = '0000';
                            $dtl->codinterno = strtoupper((string) $pd_id);
                            $dtl->nombre = $value->NmbItem;
                            $dtl->pcosto = 0;
                        } else {
                            $dtl->prod_id = (int) $prod_id->id;
                            $dtl->codinterno = strtoupper((string) $pd_id);
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
    }
}
