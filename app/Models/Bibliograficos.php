<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliograficos extends Model
{
    use HasFactory;
    protected $table = 'contenidos';
	protected $primaryKey = 'CON_ID';
    protected $fillable = ['CAT_ID','AUT_ID','EDI_ID','SEC_ID','CON_ID','CON_ISBN','CON_TITULO','CON_SUBTITULO','CON_DESC','CON_RESUMEN','CON_EDICION','CON_ANIOP','CON_LENGUAJE','CON_NPAGS','CON_ESTADO','CON_IMAGEN','CON_TIPO'];
    public $timestamps = false;
}
