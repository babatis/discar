<?php
use Illuminate\Support\Facades\Route;

// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('registrar', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::get('', function () {
        
        return view('index');
    });

    /** Productos */
   
    Route::resource('productos', 'ProductoController');
    // Route::post('productos/search', 'ProductoController@search');

    /** Precio de Producto */

    Route::resource('precios', 'PrecioVentasController');
    // Route::post('precios/search', 'PrecioVentasController@search');

    /** Compras */
    
    Route::resource('compras', 'ComprasController');
    Route::resource('proveedor', 'ProveedoresController');
    Route::post('proveedor/search', 'ProveedoresController@search');

    /** Cliente */

    Route::resource('cliente', 'ClienteController');

    /** inventario */

    Route::resource('inventario', 'InventarioController');

    /** Ventas */

    Route::resource('venta', 'VentasController');
    Route::get('venta/add/xml', 'VentasController@xmlcreate')->name('venta.xml');

    /** Archivos */

    Route::resource('archivos/unidades', 'UnidadesController');
    Route::resource('archivos/marcas', 'MarcasController');
    Route::resource('archivos/lineas', 'LineasController');
    Route::resource('archivos/familias', 'FamiliasController');

    /** Informe */
    Route::get('info/stock', 'informeController@exportPrecioProd');
    Route::get('info/rotacion', 'informeController@exportRotacionProd');

});

Route::prefix('xml')->group(function () {

   /** Abril 19 */
   
    Route::get('abril', 'XmldteController@index');

    Route::get('nc', 'XmldteController@indexNotaCredito');

    Route::get('jclient', 'XmldteController@indexJsonCliente');

    Route::get('jdtl', 'XmldteController@indexJsonDtl');

    /** Mayo 19 */

    Route::get('mayo', 'XmldteController@getMayo');

    Route::get('jdtlmayo', 'XmldteController@getJsonDtlMayo');

    Route::get('jclient-mayo', 'XmldteController@getJsonClienteMayo');

    /** Junio 19 */

    Route::get('junio', 'XmldteController@getJunio');

    // Route::get('jdtlmayo', 'XmldteController@getJsonDtlMayo');

    // Route::get('jclient-mayo', 'XmldteController@getJsonClienteMayo');

    /** solisitud de kim 77616080 */

    Route::get('r77616080', 'XmldteController@getPedido' );
});