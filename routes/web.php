<?php

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
//Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');
Auth::routes();
Route::get('/home', 'RoleVerifyController@index')->name('home');

//Se crea esta nueva ruta para poder crear el super-admin nelsonrod10
//Route::get('/', 'RoleVerifyController@crearUsuarioAdministrador');

Route::get('/demo', function () {
    return view('inicio');
});

Route::get('/', function () {
    return view('lanzamiento');
});

Route::resource('platos-del-dia', 'Menus\PlatosDelDiaController')->except([
    'index'
]);

Route::get('/buscar-plato-del-dia/{q}', 'Menus\PlatosDelDiaController@index');

Route::get('/restaurantes-plato-del-dia/{platoSeleccionado}','Menus\PlatosDelDiaController@buscarRestaurantes');
Route::get('/otros-platos-del-dia/{restaurante}/{platoActual}','Menus\PlatosDelDiaController@otrosPlatos');
Route::get('/otros-restaurantes-del-sector/{idSector}','Menus\PlatosDelDiaController@buscarOtrosRestaurantes');
Route::get('/ver-menu-restaurante/{idRestaurante}','Menus\PlatosDelDiaController@menuRestaurantes');
Route::get('/ver-menu-general/{tipo}','Menus\MenusController@index');    
Route::resource('ver-sectores', 'Sectores\BusquedaController')->except([
    'index'
]);
   
Route::get('/ciudades-sectores','Sectores\BusquedaController@index');    
Route::get('/index-sectores/{ciudad}','Sectores\BusquedaController@indexPorCiudad');    

Route::get('/restaurantes', function () {
    return view('resultados_busqueda.restaurantes');
});

Route::get('/menus', function () {
    return view('resultados_busqueda.menus');
});

Route::prefix('administrador')->middleware('auth')->group(function () {
    Route::get('/crear-restaurante', function () {
        return view('restaurantes.administrador.create');
    })->name('crear-restaurante');
    
    Route::resource('/gestion-restaurantes','Restaurantes\RestaurantesController')->except([
        'create'
    ]);
    Route::get('/sectores-por-ciudad/{ciudad}', 'SuperAdmin\SectoresController@sectoresPorCiudad');
    Route::get('/data-sector-actual/{id}', 'SuperAdmin\SectoresController@show');
    Route::get('/listado-ciudades','Sectores\BusquedaController@listadoCiudades'); 
    
    Route::resource('gestion-carta','Menus\PlatosCartasController')->except([
        'index','create','store'
    ]);
    
    //Route::get('/listado-carta/{restaurante}', 'Menus\PlatosCartasController@index')->name("listado-carta");
    //Route::get('/crear-plato-carta/{restaurante}', 'Menus\PlatosCartasController@create')->name("crear-plato-carta");
    
    Route::prefix('listado-carta')->group(function () {
        Route::get('/{restaurante}', 'Menus\PlatosCartasController@index')->name("listado-carta");
        Route::get('buscar-ingrediente/{nombre}', 'Menus\IngredientesPlatosController@buscarIngrediente');
        Route::resource('/plato', 'Menus\PlatosCartasController');
        Route::get('platos/{restaurante}', 'Menus\PlatosCartasController@getPlatos');
        Route::get('seleccion-del-dia/{idPlatoCarta}', 'Menus\PlatosCartasController@seleccionDelDia');
        Route::resource('/plato-del-dia', 'Menus\PlatosDelDiaController');
        Route::resource('/ingrediente', 'Menus\IngredientesPlatosController');
        
        Route::get('listado-ingredientes/{idPlato}', 'Menus\IngredientesPlatosController@getListadoPlato');
    });
    
    
});

Route::prefix('super-admin')->middleware('auth')->group(function () {
    Route::get('crear-listado-ingredientes', 'SuperAdmin\IngredientesController@crearListadoXML')->name("crear-listado-ingredientes");
    Route::resource('sectores', 'SuperAdmin\SectoresController');
    Route::get('listado-sectores', 'SuperAdmin\SectoresController@listadoSectores');
});



