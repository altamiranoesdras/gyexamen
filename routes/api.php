<?php

Route::group(['as'=>'api.','namespace' => 'API'], function () {

    Route::resource('options', 'OptionAPIController');



    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', 'PermissionAPIController');

        Route::resource('roles', 'RoleAPIController');

        Route::resource('users', 'UserAPIController');
        Route::get('user/add/shortcut/{user}', 'UserAPIController@addShortcut')->name('users.add_shortcut');
        Route::get('user/remove/shortcut/{user}', 'UserAPIController@removeShortcut')->name('users.remove_shortcut');


        Route::resource('departamentos', 'DepartamentoAPIController');

        Route::resource('municipios', 'MunicipioAPIController');

        Route::resource('clientes', 'ClienteAPIController');

        Route::resource('producto_tipos', 'ProductoTipoAPIController');

        Route::resource('productos', 'ProductoAPIController');

        Route::resource('cliente_procutos', 'ClienteProcutoAPIController');
    });


});
