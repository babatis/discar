<?php

use App\Http\Controllers\VentasController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** Marcas */
Route::get('/marcas', 'MarcasController@apiIndex');
Route::get('/marcas/search/{search?}', 'MarcasController@apiSearch');

/** Unidad */
Route::get('/unidades', 'UnidadesController@apiIndex');
Route::get('/unidades/search/{search?}', 'UnidadesController@apiSearch');

/** Lineas */
Route::get('/lineas', 'LineasController@apiIndex');
Route::get('/lineas/search/{search?}', 'LineasController@apiSearch');

/** Familia */
Route::get('/familias', 'FamiliasController@apiIndex');
Route::get('/familias/search/{search?}', 'FamiliasController@apiSearch');
Route::get('/familias/linea/{id?}', 'FamiliasController@getLinea');

/** Proveedores */
Route::get('/proveedores', 'ProveedoresController@apiIndex');
Route::get('/proveedores/name/{rut}', 'ProveedoresController@apiName');
Route::get('/proveedores/id/{rut}', 'ProveedoresController@apiIdName');
Route::get('/proveedores/search/{search?}', 'ProveedoresController@apiAllSearch');
Route::get('/proveedores/fineid/{search?}', 'ProveedoresController@apiShowProveedor');
Route::get('/proveedores/contac/fineid/{search?}', 'ProveedoresController@apiGetContacProv' );
Route::post('/proveedores/contac/store', 'ProveedoresController@apiStoreContacProv');
Route::get('/proveedores/nota/fineid/{search?}', 'ProveedoresController@apiGetNotaProv');
Route::post('/proveedores/nota/store', 'ProveedoresController@apiStoreNotaProv');
Route::put('/proveedores/memo/update', 'ProveedoresController@apiUpMemoprov');
Route::put('/proveedores/obser/update', 'ProveedoresController@apiUpObserprov');

/** Productos */
Route::get('/productos', 'ProductoController@apiIndex');
Route::get('/productos/all', 'ProductoController@apiIndexPag');
Route::get('/productos/price', 'ProductoController@apiPrecioVenta');
Route::get('/productos/all/search', 'ProductoController@apiSearchPag');
Route::get('/productos/search/{search?}', 'ProductoController@apiSearch');
Route::get('/productos/searchprecio/{search?}', 'ProductoController@apiSearchPrecio');
Route::get('/productos/searchpcompra/{search?}', 'ProductoController@apiSearchPCompra');
Route::get('/productos/precioall', 'PrecioVentasController@apiPrecioAll');
Route::get('/producto/code/{search?}', 'ProductoController@getApiSearchCode');

/** Clientes  */
Route::get('/allclientes', 'ClienteController@apiAllIndex');
Route::get('/allclientes/search/{search?}', 'ClienteController@apiAllSearch');
Route::get('/clientes', 'ClienteController@apiIndex');
Route::get('/cliente/fineid/{search?}', 'ClienteController@apiSearchClientVenta');
Route::get('/clientes/search/{search?}', 'ClienteController@apiSearch');
Route::get('/clientes/dte/findeid/', 'ClienteController@apiClienteDTESearch');
Route::get('/clientes/contac/fineid/{search?}', 'ClienteController@apiGetContacClient');
Route::get('/clientes/nota/fineid/{search?}', 'ClienteController@apiGetNotaClient');
Route::post('/clientes/nota/store', 'ClienteController@apiStoreNotaClient');
Route::post('/clientes/contac/store', 'ClienteController@apiStoreContacClient');

/** Ubicacion */
Route::get('/provincia', 'UbicacionController@getApiProvinciaIndex');
Route::get('/region', 'UbicacionController@getApiRegionIndex');
Route::get('/comuna', 'UbicacionController@getApiComunaIndex');

/** Venta */
Route::get('/ventas', 'VentasController@getApiVentaIndex');
Route::get('/ventas/fineid/{search?}', 'VentasController@getApiVentaClientSearch');
Route::get('/venta/dtls/fineVent/{search?}', 'VentasController@getApiVentaDtlsSearch');
Route::get('/venta/dte/finedte/{search?}', 'VentasController@getApiVentaDteSearch');
Route::get('/ventas/search/{search?}', 'VentasController@getApiVentaSearch');
Route::get('/dtl', 'VentasController@getApiDtlIndex');
Route::post('/venta/registrar/boleta', 'VentasController@setApiBoleta');
Route::post('/venta/registrar/factura','VentasController@setApiFactura');
Route::post('/venta/up/xml', 'VentasController@apiUpXmlVenta');
// Route::get('/venta', 'VentasController@getApiVentaShow');
// Route::get('/', 'VentasController@getApiVenta');

/** Compras */
Route::get('/compras', 'ComprasController@getApiCompras');
Route::get('/compras/search/{search?}', 'ComprasController@getApiComprasSearch' );
Route::get('/compraprov', 'ComprasController@getCompProv');
Route::get('/compras/fineid/{search?}', 'ComprasController@getApiComprasId');
Route::get('/compras/dtls/fine/{search?}', 'ComprasController@getApiVentaDtlId');
Route::post('/compras/finefolio/', 'ComprasController@getApiComprasFolio');

/** Info */
Route::get('/info/rotacion', 'informeController@apiGetRotacion');

/** Pago */
Route::post('pago/store/', 'PagosController@apiStorePagoRecivo');
Route::get('pago/indexid/', 'PagosController@apiIndexPagoVenta');