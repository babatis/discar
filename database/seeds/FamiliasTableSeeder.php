<?php

use Illuminate\Database\Seeder;
use App\familias;

class FamiliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familias')->delete();
        $json = File::get("database/data/NewFamilia.json");
        $data = json_decode($json);
        //print_r($data);
        foreach ($data as $obj) {
            familias::create(array(
                'code_f' =>  $obj->FCODIGO,   
                'code_l' => $obj->LINEA,
                'nombre' => $obj->FDESCRIPCION
          ));
          print_r('/ '.$obj->FCODIGO.' /');
        }
    }
}
