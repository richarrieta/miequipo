<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Route::group(['before' => 'auth'], function() {
    Route::get('', 'IndexController@inicio');
    Route::group(array('prefix' => 'administracion', 'namespace' => 'Administracion', 'before' => 'auth'), function() {
        Route::group(array('prefix' => 'seguridad', 'namespace' => 'Seguridad'), function() {
            Route::controller('usuarios', 'UsuariosController');
            Route::controller('grupos', 'GruposController');
        });
        Route::group(array('prefix' => 'tablas', 'namespace' => 'Tablas'), function() {
            Route::controller('estados', 'EstadosController');
            Route::controller('municipios', 'MunicipiosController');
            Route::controller('configuraciones', 'ConfiguracionesController');
            Route::controller('estadoCiviles', 'EstadoCivilesController');
            Route::controller('parentescos', 'ParentescosController');
            Route::controller('parroquias', 'ParroquiasController');
            Route::controller('recaudos', 'RecaudosController');
            Route::controller('tipoNacionalidades', 'TipoNacionalidadesController');
            Route::controller('personas', 'PersonasController');
            Route::controller('ayudaCampos', 'AyudaCamposController');
        });
        Route::get('', function() {
            return View::make('administracion.principal');
        });
    });
    Route::controller('fichas', 'FichasController');
    Route::controller('personas', 'PersonasController');
    Route::controller('recaudosficha', 'RecaudosFichaController');
    Route::controller('helpers', 'HelpersController');
    Route::controller('fotosficha', 'FotosFichaController');
});

Route::controller('login', 'LoginController');
