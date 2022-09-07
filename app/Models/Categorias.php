<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'categorias';
	protected $primaryKey = 'CAT_ID';
    protected $fillable = ['CAT_NOMBRE', 'CAT_DESC', 'CAT_RESUMEN','CAT_IMG','CAT_ESTADO'];
    public $timestamps = false;
}
