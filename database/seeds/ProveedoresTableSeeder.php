<?php

use App\proveedores;
use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path() . '/storage/xml/DTE_Recibidos_76944108_33_DICIEMBRE.xml';
        $SetDTE = simplexml_load_file($path);
        $dtes = $SetDTE->xpath('/SetDTE/DTE/Documento/Encabezado/Emisor');

        foreach ($dtes as $value) {

            $isProv = proveedores::where('rut', $value->RUTEmisor)->first();

            if( isset($isProv)){
                print('///' . $value->RUTRecep .' - existe n° ' . $isProv->id . 'rut: ' . $isProv->rut . '///');
            } 
            else 
            {
                $Prov = New proveedores;
                $Prov->rut = (string) $value->RUTEmisor;
                $Prov->nombre = $value->RznSoc;
                $Prov->fono = $value->Telefono;
                $Prov->direccion = $value->DirOrigen;
                $Prov->ciudad = ucwords(strtolower($value->CiudadOrigen));
                $Prov->pais = 'CHILE';
                $Prov->save();
                print(' / rut : ' . $value->RUTRecep. ' /' );
            }

        }
    }
}
