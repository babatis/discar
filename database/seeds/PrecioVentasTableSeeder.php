<?php

use App\precio_ventas;
use Illuminate\Database\Seeder;

class PrecioVentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('precio_ventas')->delete();
        $json = File::get("database/data/PROD_07_05_19_DISCAR_W_V4.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          precio_ventas::create(array(
              'prod_id' => $obj->CODIGO,
              'prov_id' => $obj->COD_PROV,
              'detalle' => 'Precio Inicial',
              'pcosto' => $obj->COSTO,
              'desct1' => $obj->DESCT1,
              'desct2' => $obj->DESCT2,
              'flete' => $obj->FLETE,
              'cantidad' => 0,
              'costotot' => $obj->TOTALCOSTO,
              'p1_neto' => $obj->NETO,
              'p1_iva' => $obj->IVA,
              'p1_venta' => $obj->VENTA,
              'p2_neto' => $obj->NETO2,
              'p2_iva' => $obj->IVA2,
              'p2_venta' => $obj->VENTA2,
              'p3_neto' => $obj->NETO3,
              'p3_iva' => $obj->IVA3,
              'p3_venta' => $obj->VENTA3,
              'activo' => '1'
          ));
          print_r('/ '.$obj->CODIGO.' /');
        }
    }
}
