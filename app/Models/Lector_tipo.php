<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector_tipo extends Model
{
    use HasFactory;
	
	protected $table = "lector_tipo";
	
    protected $fillable = [
        'LET_NOMBRE',
        'LET_DETALLE',
		'LET_TIEMPOM',
        'LET_ESTADO' => '1'
    ];
	
	protected $primaryKey = 'LET_ID';
	
	public $timestamps = false;
	
}
