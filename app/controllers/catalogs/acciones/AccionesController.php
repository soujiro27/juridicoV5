<?php
namespace App\Controllers\Catalogs\Acciones;

use App\Controllers\Catalogs\BaseController;
use App\Models\Acciones;

class AccionesController extends BaseController {
    public function getIndex() {
        $acciones = Acciones::all();
        return $this->render('/Acciones/acciones.twig',['acciones' => $acciones,'sesiones'=> $_SESSION]);
    }

    public function getCreate() {
        $duplicate = false;
        return $this->render('/Acciones/insert-acciones.twig',['sesiones'=> $_SESSION]);
    }

    public function getUpdate($id,$err) {

        $accion = Acciones::where('idAccion',$id)->first();
        return $this->render('/Acciones/update-acciones.twig',[
            'sesiones'=> $_SESSION,
            'accion'=> $accion,
            'error' => $err
        ]);
    }

    public function accionesCreate($post) {
        $fecha=strftime( "%Y-%d-%m", time() );
        $acciones = new Acciones([
            'nombre' => $post['nombre'],
            'usrAlta' => $_SESSION['idUsuario'],
            'fAlta' => $fecha
        ]);
        $acciones->save();
        echo $this->getIndex();

    }

    public function accionesUpdate($post) {
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

}