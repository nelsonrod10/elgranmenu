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

Auth::routes();
Route::get('/home', 'RoleVerifyController@index')->name('home');

Route::get('/', function () {
    return view('inicio');
});

Route::resource('platos-del-dia', 'PlatosDelDiaController')->except([
    'index'
]);

Route::get('/buscar-plato-del-dia/{q}', 'PlatosDelDiaController@index');

Route::get('/restaurantes-plato-del-dia/{idPlato}', function () {
    return view('resultados_busqueda.restaurantes');
});

Route::get('/restaurantes', function () {
    return view('resultados_busqueda.restaurantes');
});

Route::get('/menus', function () {
    return view('resultados_busqueda.menus');
});



Route::prefix('administrador')->middleware('auth')->group(function () {
    Route::resource('gestion-restaurantes','Restaurantes\RestaurantesController');
});
//Route::get('/home', 'HomeController@index')->name('home');

