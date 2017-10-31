<?php

use  App\Controllers\Catalogs\SubTiposDocumentos\SubTiposDocumentosController;

$app->get('/juridico/SubTiposDocumentos',function(){
    $get = new SubTiposDocumentosController();
    echo $get->getIndex();
});

$app->get('/juridico/SubTiposDocumentos/add',function(){
     $get = new SubTiposDocumentosController();
    echo $get->getCreate();
});

$app->post('/juridico/SubTiposDocumentos/add',function() use ($app){
    $get = new SubTiposDocumentosController();
    echo $get->sibTipoDocumentoCreate($app->request->post());
});


$app->get('/juridico/SubTiposDocumentos/update',function() use ($app){
    $id='22';
   $get = new SubTiposDocumentosController();
    echo $get->getUpdate($id);
});
/*
$app->post('/juridico/Caracteres/update',function() use ($app){
    $get = new CaracteresController();
    echo $get->caracterUpdate($app->request->post());
});
*/