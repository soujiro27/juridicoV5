<?php
namespace App\Controllers\Catalogs\SubTiposDocumentos;

use App\Controllers\Catalogs\BaseController;
use App\Models\SubTiposDocumentos;
use App\Models\TiposDocumentos;

class SubTiposDocumentosController extends BaseController {
    public function getIndex() {
        $subTipos = SubTiposDocumentos::all();
        return $this->render('/subTiposDocumentos/subTiposDocumentos.twig',['subTipos' => $subTipos,'sesiones'=> $_SESSION]);
    }

    public function getCreate() {
        $tiposDocumentos = TiposDocumentos::where('tipo','JURIDICO')->get();
        return $this->render('/subTiposDocumentos/insert-subTiposDocumentos.twig',[
            'sesiones'=> $_SESSION,
            'tiposDocumentos' => $tiposDocumentos
        ]);
    }

    public function getUpdate($id) {
        $subTipos = SubTiposDocumentos::where('idSubTipoDocumento',$id)->first();
        $tiposDocumentos = TiposDocumentos::where('tipo','JURIDICO')->get();

        return $this->render('/subTiposDocumentos/update-subTiposDocumentos.twig',[
            'sesiones'=> $_SESSION,
            'documentos' => $tiposDocumentos,
            'subtipos' => $subTipos
        ]);

    }

       public function sibTipoDocumentoCreate($post) {
           $fecha=strftime( "%Y-%d-%m", time() );
           var_dump($post);
            $subTipo = new SubTiposDocumentos([
                'idTipoDocto' =>$post['idTipoDocto'],
                'nombre' => $post['nombre'],
                'auditoria' => $post['auditoria'],
                'usrAlta' => $_SESSION['idUsuario'],
                'fAlta' => $fecha
            ]);
            $subTipo->save();
            echo $this->getIndex();

       }
/*
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