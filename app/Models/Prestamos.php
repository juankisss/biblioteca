<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
	protected $primaryKey = 'PRE_ID';
    protected $fillable = ['EJE_ID','USP_ID','USL_ID','RES_ID','PRE_FECHA','PRE_HORA','PRE_FECHAD','PRE_HORAD','PRE_OBS','PRE_ESTADO'];
    public $timestamps = false;             
}
