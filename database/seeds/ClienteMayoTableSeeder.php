<?php

use App\cliente;
use App\comuna;
use App\provincia;
use Illuminate\Database\Seeder;

class ClienteMayoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * INGRESO DE CLIENTES MES Mayo 2019
        */
        $path = public_path() . '/storage/xml/DTE_76944108_33_MAYO.xml';
        $SetDTE = simplexml_load_file($path);
       
        $dcliente = $SetDTE->xpath('/SetDTE/DTE/Documento/Encabezado/Receptor');
    
        $COMUNA = New comuna;
        $PROVINCIA = New provincia;
        $cont = 1;

        foreach ($dcliente as $value) {
           
            
            $isClient = cliente::select()->where('rut', $value->RUTRecep)->first();

            if( isset($isClient)){
                print('- existe n° ' . $isClient->id . 'rut: ' . $isClient->rut . '- /n');
            } 
            else 
            {
                $client = New cliente;
                $client->rut = (string) $value->RUTRecep;
                $client->nombre = $value->RznSocRecep;
                $client->direccion = $value->DirRecep;
                $client->pais = 'CHILE';
                // $region = $REGION->select('REGION_ID')->where('REGION_NOMBRE', 'LIKE', $value->CiudadRecep)->first() ;
                $ciudad = $PROVINCIA->select()->where('PROVINCIA_NOMBRE', 'LIKE', strtoupper($value->CiudadRecep))->first();
                $comuna = $COMUNA->select()->where('COMUNA_NOMBRE', 'LIKE', strtoupper($value->CmnaRecep))->first() ;
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
