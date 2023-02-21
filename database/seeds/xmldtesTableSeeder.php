<?php

use Illuminate\Database\Seeder;
use App\xmldte;

class xmldtesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('xmldte')->delete();

        $path = File::get("database/data/1_4.xml");
        $xml = simplexml_load_file($path);
        $json = json_encode($xml);
        $data = json_decode($json, TRUE);
        //print_r($data);
        // foreach ($data['DTE'] as $obj) {
        // 	xmldte::create(array(
        //     'codinterno' => $obj->,
        //     'nombre' => $obj->UDESCRIPCION,
        //     'cantidad' => ,
        //     'precio' => ,
        //     'monto' => ,
        //   ));
        //   print_r('/ '.$obj->UCODIGO.' /');
        // }
    }
}
