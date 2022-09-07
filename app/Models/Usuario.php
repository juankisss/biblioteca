<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
	protected $primaryKey = 'USU_ID';
    protected $fillable = [
        'PER_ID',
        'LEC_ID',
        'USU_CODIGO',
        'USU_CLAVE',
        'USU_TIPO', 
        'USU_ESTADO'
    ];
	public $timestamps = false;
}
