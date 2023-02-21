<?php

use Illuminate\Database\Seeder;
use App\lineas;

class LineasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lineas')->delete();
        $json = File::get("database/data/NewLinea.json");
        $data = json_decode($json);
        //print_r($data);
        foreach ($data as $obj) {
          lineas::create(array(
            'code_l' => $obj->LCODIGO,
            'nombre' => $obj->LDESCRIPCION
          ));
          print_r('/ '.$obj->LCODIGO.' /');
        }
    }
}
