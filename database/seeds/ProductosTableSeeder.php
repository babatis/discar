<?php


use App\productos;
use App\proveedores;
use App\precio_ventas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      DB::table('productos')->delete();
      // $json = File::get("database/data/PROD_07_05_19_DISCAR_W_V4.json");
      $json = File::get("database/data/prod_26_12_19.json");
      $data = json_decode($json);

      // $prov = New proveedores;
      // $prov->rut = '76636838-7';
      $prov = proveedores::where('rut', '76636838-7')->first();
      $prov->nombre = 'COMERCIAL LEMO MONTOYA SPA';
      $prov->giro = 'VENTA DE LUBRICANTES,  COMPRA Y VENTA DE REPUESTOS AUTOMOTRIZ, ART. DE SEGURIDAD';
      $prov->direccion = 'BARROS ARANA #3160';
      $prov->comuna = 'ARICA';
      $prov->ciudad = 'ARICA';
      $prov->pais = 'CHILE';
      $prov->fono = '582210387';
      $prov->email = 'oficina@lemo.cl';
      $prov->save();


      foreach ($data as $obj) {

        $search = productos::where('codinterno', $obj->CODINTERNO)->first();

        if($search === null){
        $prod = New productos;
        $prod->slug = Str::slug($obj->CODINTERNO, '-').'-'. Str::random(5);
        $prod->codinterno = $obj->CODINTERNO;
        $prod->barcode = $obj->CODINTERNO;
        $prod->nombre = $obj->NOMBRE;
        $prod->descripcion = $obj->NOMBRE;
        $prod->linea = $obj->LINEA;
        $prod->familia = $obj->FAMILIA;
        $prod->marca = $obj->MARCA;
        $prod->unidad = $obj->UNIDAD;
        $prod->activo = 1;
        $prod->save();

        $precio = New precio_ventas;
        $precio->prod_id = $prod->id;
        $precio->prov_id = $prov->id;
        $precio->detalle = 'Precio Inicial';
        $precio->pcosto = $obj->COSTO;
        $precio->desct1 = $obj->DESCT1;
        $precio->desct2 = $obj->DESCT2;
        $precio->flete = $obj->FLETE;
        $precio->cantidad = 0;
        $precio->costotot = $obj->TOTALCOSTO;
        $precio->p1_neto = $obj->NETO;
        $precio->p1_iva = $obj->IVA;
        $precio->p1_venta = $obj->VENTA;
        $precio->p2_neto = $obj->NETO2;
        $precio->p2_iva = $obj->IVA2;
        $precio->p2_venta = $obj->VENTA2;
        $precio->p3_neto = $obj->NETO3;
        $precio->p3_iva = $obj->IVA3;
        $precio->p3_venta = $obj->VENTA3;
        $precio->activo = 1;
        $precio->save();
        
        // $slug = Str::slug($obj->CODINTERNO, '-');
        // print_r('/ '.$obj->CODIGO.'- /');
        
        } else {
          print_r('/ existe - '.$obj->CODIGO.' /');
        }
      }
        
    }
}
