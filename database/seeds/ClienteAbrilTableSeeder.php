<?php


use App\cliente;
use App\allclientes;
// use App\region;
use App\comuna;
use App\provincia;
// use App\ventas;
// use App\venta_dtl;
use Illuminate\Database\Seeder;

class ClienteAbrilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        /**
        * INGRESO DE CLIENTES MES ABRIL 2019
        */
        DB::table('clientes')->delete();

        $jcliente = File::get('database/data/Clientes_Abril_V6.json');
        // $jcliente = File::get('database/data/Clientes_Mayo.json');
        // $contents = utf8_encode($jcliente);
        $dcliente = json_decode($jcliente);
        $AllClient = New allclientes;
        // $REGION = New region;
        $COMUNA = New comuna;
        $PROVINCIA = New provincia;
        $cont = 1;
        foreach ($dcliente as $value) {
           
            $isClient = cliente::select()->where('rut', $value->RUTRecep)->first();

            if( isset($isClient)){
                print('- existe n° ' . $isClient->id . 'rut: ' . $isClient->rut . '-');
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
