<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectores extends Model
{
    use HasFactory;
	
	protected $table = "lectores";
	
    protected $fillable = [
        'LEC_ID',
        'LET_ID',
        'LEC_NOMBRES',
        'LEC_APELLIDOS',
        'LEC_CI',
        'LEC_GENERO',
        'LEC_ROL',
        'LEC_EMAIL',
        'LEC_CELULAR',
        'LEC_DIRECCION',
        'LEC_ESTADO'
    ];
	public $timestamps = false;
	//protected $hidden = ['LEC_ID'];
	protected $primaryKey = 'LEC_ID';
}
