<?php
namespace App\Controllers\Catalogs\DoctosTextos;

use App\Controllers\Catalogs\BaseController;
use App\Models\DoctosTextos;
use App\Models\TiposDocumentos;
use App\Models\SubTiposDocumentos;


class DoctosTextosController extends BaseController {
   public function getIndex() {
        $doctosTextos = DoctosTextos::all();
       return $this->render('/doctosTextos/doctosTextos.twig',['doctosTextos' => $doctosTextos,'sesiones'=> $_SESSION]);
   }

   public function getCreate() {
       $tiposDocumentos = TiposDocumentos::where('tipo','JURIDICO')->get();
        return $this->render('/doctosTextos/insert-doctoTexto.twig',[
        'sesiones'=> $_SESSION,
        'tiposDocumentos' => $tiposDocumentos
        ]);
   }

   public function getUpdate($id) {
     
        $doctoTexto = DoctosTextos::where('idDocumentoTexto',$id)->first();
        $tiposDocumentos = TiposDocumentos::where('tipo','JURIDICO')->get();
        $subTipos = SubTiposDocumentos::where('idTipoDocto',$doctoTexto['idTipoDocto'])->get();
        return $this->render('/doctosTextos/update-doctoTexto.twig',[
            'sesiones'=> $_SESSION, 
            'doctoTexto' => $doctoTexto,
            'documentos' => $tiposDocumentos,
            'subtipos' => $subTipos
            ]);

   }
/*
   public function caracterCreate($post) {
       $fecha=strftime( "%Y-%d-%m", time() );
        $caracter = new Caracteres([
            'siglas' =>$post['siglas'],
            'nombre' => $post['nombre'],
            'usrAlta' => $_SESSION['idUsuario'],
            'fAlta' => $fecha
        ]);
        $caracter->save();
        echo $this->getIndex();

   }

   public function caracterUpdate($post) {
    $fecha=strftime( "%Y-%d-%m", time() );
    Caracteres::where('idCaracter',$post['idCaracter'])->update([
        'siglas' =>$post['siglas'],
        'nombre' => $post['nombre'],
        'usrModificacion' => $_SESSION['idUsuario'],
        'fModificacion' => $fecha
     ]);
     echo $this->getIndex();

}*/

}