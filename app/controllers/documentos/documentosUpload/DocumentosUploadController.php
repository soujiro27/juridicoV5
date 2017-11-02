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


    public function update($post,$file) {
        $nombre=$file['anexoDoc']['name'];
        $extension=explode('.',$nombre);
        if(move_uploaded_file($file['anexoDoc']['tmp_name'],"juridico/public/files/".$post['idVolante'].'.'.$extension[1]))
        {
            $fecha=strftime( "%Y-%d-%m", time() );
            Volantes::where('idVolante',$post['idVolante'])->update([
                'anexoDoc' => $post['idVolante'].'.'.$extension[1],
                'usrModificacion' => $_SESSION['idUsuario'],
                'fModificacion' => $fecha
            ]);
            echo $this->getIndex();
        }


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


*/
    public function duplicate($post) {
        $duplicate = DocumentosUploadController::where('idVolante' ,$post['idVolante'])
            ->first();
        return $duplicate;
    }

}