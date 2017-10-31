<?php
namespace App\Controllers\Documentos\Volantes;

use App\Controllers\Catalogs\BaseController;
use App\Models\Volantes;
use \App\Models\Caracteres;
class VolantesController extends BaseController {
    public function getIndex() {
        $volantes = Volantes::select('sia_Volantes.idVolante','sia_catCaracteres.nombre')
        ->join('sia_catCaracteres','sia_catCaracteres.idCaracter','=','sia_Volantes.idCaracter')
        ->get();
       var_dump($volantes);
        //return $this->render('/caracteres/caracteres.twig',['caracteres' => $caracteres,'sesiones'=> $_SESSION]);
    }
/*
    public function getCreate() {
        $duplicate = false;
        return $this->render('/caracteres/insert-caracter.twig',['sesiones'=> $_SESSION]);
    }

    public function getUpdate($id,$err) {

        $caracter = Caracteres::where('idCaracter',$id)->first();
        return $this->render('/caracteres/update-caracter.twig',[
            'sesiones'=> $_SESSION,
            'caracter'=> $caracter,
            'error' => $err
        ]);
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
        echo $this->getIndex();

    }

    public function caracterUpdate($post) {
        $duplicate = $this->duplicate($post);
        if(empty($duplicate)){
            $fecha=strftime( "%Y-%d-%m", time() );
            Caracteres::where('idCaracter',$post['idCaracter'])->update([
                'siglas' =>$post['siglas'],
                'nombre' => $post['nombre'],
                'usrModificacion' => $_SESSION['idUsuario'],
                'fModificacion' => $fecha,
                'estatus' => $post['estatus']
            ]);
            echo $this->getIndex();
        }else{

            echo $this->getUpdate($post['idCaracter'],true);
        }

    }

    public function duplicate($post) {
        $duplicate = Caracteres::where('siglas',$post['siglas'])->where('nombre' ,$post['nombre'])->where('estatus',$post['estatus'])->first();
        return $duplicate;
    }
*/
}