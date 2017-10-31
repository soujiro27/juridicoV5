<?php

include '/../vendor/autoload.php';
include_once '/../app/routes/caracteres/rutasCaracteres.php';
include_once '/../app/routes/doctosTextos/rutasDoctosTextos.php';
include_once '/../app/routes/subTiposDocumentos/rutasSubTiposDocumentos.php';

use  App\Controllers\Catalogs\Caracteres\CaracteresController;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'sqlsrv',
    'host'      => 'localhost',
    'database'  => 'ascm_sia',
    'username'  => '',
    'password'  => '
    ',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();




