<?php

use  App\Controllers\Documentos\VolantesDiversos\VolantesDiversosController;

$app->get('/juridico/VolantesDiversos',function(){
    $get = new VolantesDiversosController();
    echo $get->getIndex();
});

$app->get('/juridico/VolantesDiversos/add',function(){
    $get = new VolantesDiversosController();
    echo $get->getCreate();
});

$app->post('/juridico/VolantesDiversos/add',function() use ($app){
     $get = new VolantesDiversosController();
    echo $get->volantesCreate($app->request->post());
});


$app->get('/juridico/VolantesDiversos/update',function() use ($app){
    $id='3215';
     $get = new VolantesDiversosController();
    echo $get->getUpdate($id,false);
});

$app->post('/juridico/VolantesDiversos/update',function() use ($app){
     $get = new VolantesDiversosController();
    echo $get->volantesUpdate($app->request->post());
});
