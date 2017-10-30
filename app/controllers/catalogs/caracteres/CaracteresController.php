<?php
namespace App\Controllers\Catalogs\Caracteres;

use App\Controllers\Catalogs\BaseController;
use App\Models\Caracteres;

class CaracteresController extends BaseController {
   public function getIndex() {
        $caracteres = Caracteres::all();
       return $this->render('caracteres.twig',['caracteres' => $caracteres]);
   }

   public function getCreate() {
        return $this->render('insert-caracter.twig');
   }
   public function caracterCreate($post) {
       $fecha=strftime( "%Y-%d-%m", time() );
        $caracter = new Caracteres([
            'siglas' =>$post['siglas'],
            'nombre' => $post['nombre'],
            'usrAlta' => $_SESSION['idUsuario'],
            'fAlta' => $fecha
        ]);
        $caracter->save();

   }
}