<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $table = 'reservas';
	protected $primaryKey = 'RES_ID';
    //protected $fillable = ['EJE_ID','USP_ID','USL_ID','RES_FECHA','RES_DESDEF','RES_DESDEH','RES_HASTAF','RES_HASTAH','RES_FECHAD','RES_OBS','RES_ESTADO'];
	protected $fillable = ['EJE_ID','USP_ID','USL_ID','RES_FECHA','RES_FECHAR','RES_HORAR','RES_OBS','RES_ESTADO'];
    public $timestamps = false;
}
