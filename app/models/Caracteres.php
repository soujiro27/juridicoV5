<?php
namespace App\Models;
 use Illuminate\Database\Eloquent\Model;

 class Caracteres extends Model {
     public $timestamps = false;
     protected $table = 'sia_catCaracteres';
     protected $fillable = ['siglas', 'nombre','usrAlta','fAlta','estatus'];

 }