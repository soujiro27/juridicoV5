<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caracteres;
class Volantes extends Model {
    public $timestamps = false;
    protected $table = 'sia_Volantes';
    protected $primaryKey = 'idVolante';
    //protected $fillable = ['siglas', 'nombre','usrAlta','fAlta','estatus'];

    public function caracteres() {
        return $this->hasMany('App\Models\Caracteres');
    }

}