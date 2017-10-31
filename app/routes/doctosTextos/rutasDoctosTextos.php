<?php

use  App\Controllers\Catalogs\DoctosTextos\DoctosTextosController;

$app->get('/juridico/DoctosTextos',function(){
    $get = new DoctosTextosController();
     echo $get->getIndex();
});

$app->get('/juridico/DoctosTextos/add',function(){
    $get = new DoctosTextosController();
    echo $get->getCreate();
});
/*
$app->post('/juridico/Caracteres/add',function() use ($app){
    $get = new CaracteresController();
    echo $get->caracterCreate($app->request->post());
});
*/

$app->get('/juridico/DoctosTextos/update',function() use ($app){
    $id='3';
    $get = new DoctosTextosController();
    echo $get->getUpdate($id);
});
/*
$app->post('/juridico/Caracteres/update',function() use ($app){
    $get = new CaracteresController();
    echo $get->caracterUpdate($app->request->post());
});
*/