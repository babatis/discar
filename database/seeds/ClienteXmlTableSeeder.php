<?php

use Illuminate\Database\Seeder;

class ClienteXmlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('clientes')->delete();

        $path = File::get('database/data/Clientes_Abril_V6.json');

        $DATA = simplexml_load_file($path);

        // $cliente = array();
        foreach ($DATA as $ROW) {
           echo ' - ' . $ROW->RUTRecepRUTRecep;
        }


    }
}
