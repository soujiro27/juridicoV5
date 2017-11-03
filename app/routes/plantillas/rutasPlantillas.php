<?php

use  App\Controllers\Documentos\Plantilla\PlantillaController;

$app->get('/juridico/Plantillas',function(){
    $get = new PlantillaController();
    echo $get->getIndex();
});

$app->get('/juridico/Plantillas/add/:id',function($id){
    $id = '3210';
    $get = new PlantillaController();
    echo $get->getCreate($id);
});

$app->post('/juridico/Plantillas/add',function() use ($app){
    $get = new PlantillaController();
    $get->create($app->request->post());
});

$app->post('/juridico/Plantillas/update',function() use ($app){
    $get = new PlantillaController();
    echo $get->update($app->request->post());
});
/*

$app->get('/juridico/Acciones/update',function() use ($app){
    $id='2009';
    $get = new AccionesController();
    echo $get->getUpdate($id,false);
});

$app->post('/juridico/Acciones/update',function() use ($app){
    $get = new AccionesController();
    echo $get->accionesUpdate($app->request->post());
});
*/