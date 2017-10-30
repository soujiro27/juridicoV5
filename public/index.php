<?php

include '/../vendor/autoload.php';

use  App\Controllers\Catalogs\Caracteres\CaracteresController;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'sqlsrv',
    'host'      => 'localhost',
    'database'  => 'ascm_sia',
    'username'  => 'sa',
    'password'  => '.sqlDemo13.',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();




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


