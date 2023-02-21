<?php

use App\ventas;
use App\ventas_dte;
use Illuminate\Database\Seeder;

class DteNCEnero20Seeder extends Seeder
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
        $path = public_path() . '/storage/xml/DTE_76944108_61_ENERO_20.xml';
        
        $SetDTE = simplexml_load_file($path);

        $exams = Self::xsortdte($SetDTE, SORT_ASC);

        
        foreach ($exams as $exam) {
                
            print('Exam.Folio ->' . $exam->Folio . ' -|- ');

        foreach ($SetDTE as $dte) {
            
            if ($dte->Documento->Encabezado->IdDoc->Folio == $exam->Folio) {
                
                foreach ($dte->Documento as  $value) {
                    
                    $dteRef = ventas_dte::where('tipodte', $value->Referencia->TpoDocRef)
                                        ->where('folio', $value->Referencia->FolioRef)
                                        ->first();

                    print('Ref_Venta -> ' . $dteRef['venta_id'] . '| Ref_Venta -> '.  $dteRef['client_id'] . ' / ');

                    $dtes = New ventas_dte;
                    $dtes->venta_id = (int) $dteRef->venta_id;
                    $dtes->client_id = (int) $dteRef->client_id;
                    $dtes->tipodte = $value->Encabezado->IdDoc->TipoDTE;
                    $dtes->folio = $value->Encabezado->IdDoc->Folio;
                    $dtes->subtotal = $value->Encabezado->Totales->MntNeto;
                    $dtes->mntneto = $value->Encabezado->Totales->MntNeto;
                    $dtes->desc = 0;
                    $dtes->tasaiva = $value->Encabezado->Totales->TasaIVA;
                    $dtes->iva = $value->Encabezado->Totales->IVA;
                    $dtes->mnttotal = $value->Encabezado->Totales->MntTotal;
                    $dtes->tdteref = $value->Referencia->TpoDocRef;
                    $dtes->folioref = $value->Referencia->FolioRef;
                    $dtes->codref = $value->Referencia->CodRef;
                    $dtes->razonref = $value->Referencia->RazonRef;
                    $dtes->fchemis = $value->Encabezado->IdDoc->FchEmis;
                    $dtes->fchvenc = $value->Encabezado->IdDoc->FchEmis;
                    $dtes->created_at = $value->Encabezado->IdDoc->FchEmis;
                    $dtes->save();

                    switch ($value->Referencia->CodRef) {
                        case 1:
                            $dteRef->abono =  $dteRef->mnttotal;
                            $dteRef->fmapago = 'Nota de Credito';
                            $dteRef->estado = 'NULA';
                            $dteRef->nota = 'NULA';

                            $vent = ventas::findOrFail((int) $dteRef->venta_id);
                            $vent->estado = 'NULA';
                            $vent->save();

                            break;
                        case 2:
                            $dteRef->nota = 'Corrige Texto Documento de Referencia';
                            break;
                        case 3:
                            $dteRef->abono = $value->Encabezado->Totales->MntTotal;
                            $vent = ventas::find((int) $dteRef->venta_id);
                            $vent->abono = $value->Encabezado->Totales->MntTotal;
                            $vent->save();
                            $dteRef->nota = 'Corrige Montos del Documentos Referencia';
                            break;
                    }
                    $dteRef->save();

                    }
                }
            }
        }
    
    }
}
