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


Route::when('admin', 'needLogin');
Route::when('admin/*', 'needLogin');
Route::get('admin', function() {
    return View::make('admin');
});

Route::controller('admin/farmacias', 'FarmaciasController');
Route::controller('admin/servicios', 'ServiciosController');
Route::controller('admin/imagenes', 'ImagenesController');
Route::controller('admin/admin', 'UsersController');
Route::controller('admin/rol', 'GroupsController');
Route::controller('login', 'LoginController');
Route::controller('admin/promociones', 'PromocionController');
Route::controller('/', 'PublicController');

Route::get('logout', function() {
    Sentry::logout();
    return Redirect::to('/');
});


Route::get('prueba1', function() {

    $farmacia = new Farmacia;

    $farmacia->nombre = "nombre3";
    $farmacia->slogan = "slogan3";
    $farmacia->direccion = "direccion de farmacia3";
    $farmacia->latitud = "10.555555";
    $farmacia->longitud = "-10.222222";
    $farmacia->horario = "de 8am a 8pm";
    $farmacia->telefono = "02742624588";

    if ($farmacia->save())
        return "El registro ha sido guardado.";
    else
        return $farmacia->getErrors();
});

Route::get('prueba2', function() {

    $servicio = new Servicio;

    $servicio->nombre = "Servicio1";

    if ($servicio->save())
        return "El registro ha sido guardado.";
    else
        return $servicio->getErrors();
});

Route::get('prueba3', function() {
    $farmacia = new Farmacia;

    $info = array('nombre' => '24 horas');
    if ($farmacia->servicios()->insert($info))
        return "El registro ha sido guardado.";
    else
        return $farmacia->getErrors();
});

// crea un grupo
Route::get('prueba4', function() {

    $groups = new Group;

    $groups->name = "Groups1";
    $groups->permissions = '{"admin":1}';

    if ($groups->save())
        return "El registro ha sido guardado.";
    else
        return $groups->getErrors();
});

// crea un users y lo asigna al grupo con id=1
Route::get('prueba5', function() {

    // Create the user
    $users = Sentry::createUser(array(
                'first_name' => 'nombre',
                'last_name' => 'apellido',
                'email' => 'email@4geeks.com.ve',
                'password' => Hash::make('miclave'),
                'activated' => true,
                'permissions' => array(
                    'user.create' => -1, 'user.delete' => -1,
                    'user.view' => 1, 'user.update' => 1,),
    ));
    // Find the group using the group id
    $adminGroup = Sentry::findGroupById(1);
    // Assign the group to the user
    $users->addGroup($adminGroup);
    //$user->save();
    return "El registro ha sido guardado.";
});

Route::filter('needLogin', function() {
    if (!Sentry::check()) {
        return Redirect::to('login');
    }
});
