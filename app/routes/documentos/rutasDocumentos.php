<?php

use  App\Controllers\Documentos\DocumentosUpload\DocumentosUploadController;

$app->get('/juridico/DocumentosGral',function(){
    $get = new DocumentosUploadController();
    echo $get->getIndex();
});

$app->get('/juridico/DocumentosGral/update',function(){
     $get = new DocumentosUploadController();
    echo $get->getCreate();
});

$app->post('/juridico/DocumentosGral/update',function() use ($app){
    $get = new DocumentosUploadController();
    echo $get->update($app->request->post(),$_FILES);
});

/*
$app->post('/juridico/Acciones/add',function() use ($app){
    $get = new AccionesController();
    $get->accionesCreate($app->request->post());
});


$app->get('/juridico/Acciones/update',function() use ($app){
    $id='2009';
    $get = new AccionesController();
    echo $get->getUpdate($id,false);
});


*/