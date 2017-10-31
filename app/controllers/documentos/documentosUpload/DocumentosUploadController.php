<?php
namespace App\Controllers\Documentos\DocumentosUpload;

use App\Controllers\Catalogs\BaseController;
use App\Models\Volantes;

class DocumentosUploadController extends BaseController {
    public function getIndex() {
        $documentos = Volantes::select('sia_volantes.idVolante','sia_volantes.folio','sia_volantes.numDocumento',
            'sub.nombre','sia_volantes.idRemitente','sia_volantes.anexoDoc','t.estadoProceso')
            ->join('sia_VolantesDocumentos as vd','vd.idVolante','=','sia_volantes.idVolante')
            ->join('sia_catSubTiposDocumentos as sub','sub.idSubTipoDocumento','=','vd.idSubTipoDocumento')
            ->join('sia_turnosJuridico as t','t.idVolante','=','sia_volantes.idVolante')
            ->get();

        return $this->render('/documentos/documentos.twig',['documentos' => $documentos,'sesiones'=> $_SESSION]);
    }

    public function getCreate() {
        $duplicate = false;
        return $this->render('/documentos/insert-documentos.twig',['sesiones'=> $_SESSION]);
    }
/*
    public function getUpdate($id,$err) {

        $accion = Acciones::where('idAccion',$id)->first();
        return $this->render('/Acciones/update-acciones.twig',[
            'sesiones'=> $_SESSION,
            'accion'=> $accion,
            'error' => $err
        ]);
    }

    public function create($post) {
        $fecha=strftime( "%Y-%d-%m", time() );
        $acciones = new Acciones([
            'nombre' => $post['nombre'],
            'usrAlta' => $_SESSION['idUsuario'],
            'fAlta' => $fecha
        ]);
        $acciones->save();
        echo $this->getIndex();

    }

    public function update($post) {
        $duplicate = $this->duplicate($post);
        if(empty($duplicate)){
            $fecha=strftime( "%Y-%d-%m", time() );
            Acciones::where('idAccion',$post['idAccion'])->update([
                'nombre' => $post['nombre'],
                'usrModificacion' => $_SESSION['idUsuario'],
                'fModificacion' => $fecha,
                'estatus' => $post['estatus']
            ]);
            echo $this->getIndex();
        }else{

            echo $this->getUpdate($post['idAccion'],true);
        }

    }

    public function duplicate($post) {
        $duplicate = Acciones::where('nombre' ,$post['nombre'])
            ->where('estatus',$post['estatus'])
            ->first();
        return $duplicate;
    }
*/
}