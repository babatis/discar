<?php

use Illuminate\Database\Seeder;
use App\unidades;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->delete();
        $json = File::get("database/data/NewUnidad.json");
        $data = json_decode($json);
        //print_r($data);
        foreach ($data as $obj) {
        	unidades::create(array(
            'code_u' => $obj->UCODIGO,
            'nombre' => $obj->UDESCRIPCION
          ));
          print_r('/ '.$obj->UCODIGO.' /');
        }
    }
}
