<?php

use App\productos;
use Illuminate\Database\Seeder;

class AcualizarCantidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/INVENTARIO_30_09_19.json");
        $data = json_decode($json);
        //print_r($data);
        foreach ($data as $obj) {
        	
            $prod = productos::where('codinterno', $obj->Codigo )->first();

            $prod->cantidad = $obj->Cantidad;
            $prod->save();

            print_r('/ '.$obj->Codigo.' /');
        }
    }
}
