<?php

use  App\Controllers\Documentos\Volantes\VolantesController;

$app->get('/juridico/Volantes',function(){
    $get = new VolantesController();
    echo $get->getIndex();
});

$app->get('/juridico/Volantes/add',function(){
    $get = new VolantesController();
    echo $get->getCreate();
});

$app->post('/juridico/Volantes/add',function() use ($app){
    $get = new VolantesController();
    echo $get->volantesCreate($app->request->post());
});


$app->get('/juridico/Volantes/update',function() use ($app){
    $id='3214';
     $get = new VolantesController();
    echo $get->getUpdate($id,false);
});

$app->post('/juridico/Volantes/update',function() use ($app){
   $get = new VolantesController();
    echo $get->volantesUpdate($app->request->post());
});
