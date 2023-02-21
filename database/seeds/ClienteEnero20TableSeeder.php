<?php

use App\cliente;
use App\comuna;
use App\provincia;
use Illuminate\Database\Seeder;

class ClienteEnero20TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path() . '/storage/xml/DTE_76944108_33_FEBRERO_20.xml';
        $SetDTE = simplexml_load_file($path);
        $dtes = $SetDTE->xpath('/SetDTE/DTE/Documento/Encabezado/Receptor');

        $COMUNA = New comuna;
        $PROVINCIA = New provincia;
        $cont = 1;
        foreach ($dtes as $value) {
                       
            $isClient = cliente::where('rut', $value->RUTRecep)->first();

            if( isset($isClient)){
                print('///' . $value->RUTRecep .' - existe n° ' . $isClient->id . 'rut: ' . $isClient->rut . '///');
            } 
            else 
            {
            
                $client = New cliente;
                $client->rut = (string) $value->RUTRecep;
                $client->nombre = $value->RznSocRecep;
                $client->direccion = $value->DirRecep;
                $client->pais = 'CHILE';
                // $region = $REGION->select('REGION_ID')->where('REGION_NOMBRE', 'LIKE', $value->CiudadRecep)->first() ;
                $ciudad = $PROVINCIA->where('PROVINCIA_NOMBRE', $value->CiudadRecep)->first();
                $comuna = $COMUNA->where('COMUNA_NOMBRE', $value->CmnaRecep)->first() ;
                $client->region = (int) $ciudad->PROVINCIA_REGION_ID;
                $client->ciudad = (int) $ciudad->PROVINCIA_ID;
                $client->comuna = (int) $comuna->COMUNA_ID;
                $client->giro = $value->GiroRecep;
                $client->save();
                print(' / no ' . $value->RUTRecep . ' - ' . $cont);
                                        
            }
             
            $cont++;
           
        }
    }
}
