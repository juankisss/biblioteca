<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;
    protected $table = 'notificaciones';
	protected $primaryKey = 'NOT_ID';
    protected $fillable = ['PRE_ID','RES_ID','NOT_MENSAJE','NOT_ESTADO','NOT_TIPO'];
    public $timestamps = false;
}
