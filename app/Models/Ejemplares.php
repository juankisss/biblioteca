<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplares extends Model
{
    use HasFactory;
    protected $table = 'ejemplares';
	protected $primaryKey = 'EJE_ID';
    protected $fillable = ['CON_ID', 'EJE_CODIGO', 'EJE_DETALLE','EJE_OBS','EJE_ESTADO'];
    public $timestamps = false;
}
