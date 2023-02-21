<?php

use Illuminate\Database\Seeder;
use App\marcas;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->delete();
        $json = File::get("database/data/NewMarcas.json");
        $data = json_decode($json);
        //print_r($data);
        foreach ($data as $obj) {
          marcas::create(array(
            'code_m' => $obj->MCODIGO,
            'nombre' => $obj->MDESCRIPCION
          ));
          print_r('/ '.$obj->MCODIGO.' /');
        }
    }
}
