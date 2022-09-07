<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    use HasFactory;
    protected $table = 'secciones';
	protected $primaryKey = 'SEC_ID';
    protected $fillable = ['SEC_NOMBRE', 'SEC_DESC', 'SEC_REFERENCIA', 'SEC_ESTADO'];
    public $timestamps = false;
}
