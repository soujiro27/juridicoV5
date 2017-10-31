<?php

use  App\Controllers\Catalogs\Caracteres\CaracteresController;

$app->get('/juridico/Caracteres',function(){
    $get = new CaracteresController();
     echo $get->getIndex();
});

$app->get('/juridico/Caracteres/add',function(){
    $get = new CaracteresController();
    echo $get->getCreate();
});

$app->post('/juridico/Caracteres/add',function() use ($app){
    $get = new CaracteresController();
    echo $get->caracterCreate($app->request->post());
});


$app->get('/juridico/Caracteres/update',function() use ($app){
    $id='1042';
    $get = new CaracteresController();
    echo $get->getUpdate($id,false);
});

$app->post('/juridico/Caracteres/update',function() use ($app){
    $get = new CaracteresController();
    echo $get->caracterUpdate($app->request->post());
});
