<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    protected $seeders = [
        'RegionTableSeeder',
        'UnidadesTableSeeder',
        'MarcasTableSeeder',
        'LineasTableSeeder',
        'FamiliasTableSeeder',
        'ProveedoresTableSeeder',
        'ProductosTableSeeder',
        //--'PrecioVentasTableSeeder',
        'ClienteAbrilTableSeeder',
        'ClienteMayoTableSeeder',
        'ClienteJunioTableSeeder',
        'ClienteJulioTableSeeder',
        'ClienteAgostoTableSeeder',
        'ClienteSeptiembreTableSeeder',
        'ClienteOctubreTableSeeder',
        'ClienteNoviembreTableSeeder',
        'ClienteDiciembreTableSeeder',
        'ClienteEnero20TableSeeder',
        'ClienteFebrero20TableSeeder',
        'VentaAbrilTableSeeder',
        'DteNCAbrilSeeder',
        'VentaMayoTableSeeder',
        'DteNCMayoSeeder',
        'VentaJunioTableSeeder',
        'DteNCJunioSeeder',
        'VentaJulioTableSeeder',
        'DteNCJulioSeeder',
        'VentaAgostoTableSeeder',
        'DteNCAgostoSeeder',
        'VentaSeptiembreTableSeeder',
        'DteNCSeptiembreSeeder',
        'VentaOctubreTableSeeder',
        'DteNCOctubreSeeder',
        'VentaNoviembreTableSeeder',
        'DteNCNoviembreSeeder',
        'VentaDiciembreTableSeeder',
        'VentaEnero20TableSeeder',
        'DteNCDiciembreSeeder',
        'DteNCEnero20Seeder',
        'VentasFebrero20TableSeeder',
        'DteNCFebrero20Seeder',
        'UpdateContProdSeeder',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->seeders as $seed){
            $this->call($seed);
        }
    }
}
