<?php

use  App\Controllers\Catalogs\Acciones\AccionesController;

$app->get('/juridico/Acciones',function(){
    $get = new AccionesController();
    echo $get->getIndex();
});

$app->get('/juridico/Acciones/add',function(){
    $get = new AccionesController();
    echo $get->getCreate();
});

$app->post('/juridico/Acciones/add',function() use ($app){
    $get = new AccionesController();
    $get->accionesCreate($app->request->post());
});


$app->get('/juridico/Acciones/update',function() use ($app){
    $id='2009';
    $get = new AccionesController();
    echo $get->getUpdate($id,false);
});

$app->post('/juridico/Acciones/update',function() use ($app){
    $get = new AccionesController();
    echo $get->accionesUpdate($app->request->post());
});
