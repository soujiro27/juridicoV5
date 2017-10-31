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

    public function getUpdate($id,$err) {
        $subTipos = SubTiposDocumentos::where('idSubTipoDocumento',$id)->first();
        $tiposDocumentos = TiposDocumentos::where('tipo','JURIDICO')->get();

        return $this->render('/subTiposDocumentos/update-subTiposDocumentos.twig',[
            'sesiones'=> $_SESSION,
            'documentos' => $tiposDocumentos,
            'subtipos' => $subTipos,
            'error' => $err
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

       public function SubTiposDocumentosUpdate($post) {
        $duplicate = $this->duplicate($post);
        if(empty($duplicate)){
            $fecha=strftime( "%Y-%d-%m", time() );
            SubTiposDocumentos::where('idSubTipoDocumento',$post['idSubTipoDocumento'])->update([
                'idTipoDocto' =>$post['idTipoDocto'],
                'nombre' => $post['nombre'],
                'auditoria' => $post['auditoria'],
                'estatus' => $post['estatus'],
                'usrModificacion' => $_SESSION['idUsuario'],
                'fModificacion' => $fecha
            ]);
            echo $this->getIndex();
        }else{
            echo $this->getUpdate($post['idSubTipoDocumento'],true);
        }


    }

    public function duplicate($post) {
        $duplicate = SubTiposDocumentos::where('idTipoDocto',$post['idTipoDocto'])
            ->where('nombre' ,$post['nombre'])
            ->where('auditoria',$post['auditoria'])
            ->where('estatus',$post['estatus'])->first();
        return $duplicate;
    }

}